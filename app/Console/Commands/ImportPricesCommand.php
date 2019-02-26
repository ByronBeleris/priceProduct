<?php

namespace App\Console\Commands;

use App\Models\Contracts\IUnitOfWork;
use App\Models\Objects\Entities\Price;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImportPricesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import prices from the csv file';


    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var IUnitOfWork
     */
    private $unitOfWork;

    /**
     * @var integer
     */
    private $batchSize;


    /**
     * @var Connection
     */
    protected $connection;

    /**
     * ICreate a new command instance.
     *
     * @param IUnitOfWork $uow
     * @param EntityManager $em
     * @return void
     */
    public function __construct( IUnitOfWork $uow, EntityManager $em)
    {
        parent::__construct();
        $this->batchSize = 20;
        $this->unitOfWork = $uow;
        $this->em = $em;
        $this->connection = $this->em->getConnection();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->MakeArrayFromCsv('storage/import.csv' );
        $length = count($data)/10;
        foreach ($data as $i => $item) {
            $price = $this->MapPrice($item);
            $this->em->persist($price);

            if ( ( $i % $this->batchSize ) == 0 && $i > 0) {
                $this->em->flush();
                $this->em->clear();
                echo '.';
                if( ( $i % $length ) === 0 && $i !== 0 )
                {
                    echo ( $i / 800 ).'0%' . "\n";
                }
            }
        }
        $this->em->flush();
        $this->em->clear();
        echo '.';
        echo '100%' . "\n";

    }


    /**
     * Creates and returns an array from the selected csv file
     *
     * @param string $filename
     * @param string $delimiter
     * @return array
     */
    private function MakeArrayFromCsv($filename = '', $delimiter = ',')
    {

        $headerRow = null;
        $arr = array();
        $file = fopen($filename, 'r');
        if ( $file !== false)
        {
            while (($row = fgetcsv($file, 1000, $delimiter)) !== false)
            {
                if (!$headerRow)
                {
                    $headerRow = $row;
                }
                else
                {
                    $arr[] = array_combine($headerRow, $row);
                }
            }
            fclose($file);
        }
        return $arr;
    }

    /**
     * Maps price using the given row from the csv file
     *
     * @param array $item
     * @return Price
     */
    private function MapPrice( array $item )
    {
        $price = new Price();
        $price->SetAccount( $this->unitOfWork->AccountRepository()->GetByRef( $item[ 'account_ref' ] ) );
        $price->SetUser( $this->unitOfWork->UserRepository()->GetByRef( $item[ 'user_ref' ] ) );
        $price->SetProduct( $this->unitOfWork->ProductRepository()->GetBySku( $item[ 'sku' ] ) );
        $price->SetQuantity( $item[ 'quantity' ]  );
        $price->SetValue( $item[ 'value' ]  );
        return $price;
    }

}
