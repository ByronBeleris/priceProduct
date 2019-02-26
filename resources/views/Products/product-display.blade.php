@extends('Layouts.app')

@section('content')
    <div ng-controller="ProductController" >
        <div class="container" ng-cloak>
            <br>
            <div class="row product-row-search">
                <div class="col-2">
                    <label>Product Code</label>
                </div>
                <div class="col-4">
                    <tags-input ng-model="products.productCodes">
                    </tags-input>
                </div>
                <div class="col-2">
                    <label>Account Id</label>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" ng-model="products.accountId"/>
                </div>
                <br>
            </div>
            <br>
            <div class="row" style="justify-content:center;">
                <button class="btn btn-success" ng-click="search()">Search</button>
            </div>
            <br>
            <div class="row" ng-if="productModel != null">
                <div class="jumbotron">
                    <h1 class="display-4">@{{ productModel.Name }}</h1>
                    <p class="lead">This price is from the <span ng-if="productModel.InDatabase">database.</span><span ng-if="!productModel.InDatabase">json file.</span></p>
                    <p class="lead"><strong>Description:</strong>  @{{ productModel.Description }}</p>
                    <hr class="my-4">
                    <p><strong>SKU:</strong> @{{ productModel.Sku }}</p>
                    <p><strong>Price:</strong> @{{ productModel.Price | number : 2  }}</p>
                    <p><strong>Product Id:</strong> @{{ productModel.Id }}</p>
                    <p ng-if="productModel.AccountId != null"><strong>Account Id:</strong> @{{ productModel.AccountId }}</p>
                    <p ng-if="productModel.AccountName != null"><strong>Account Name:</strong> @{{ productModel.AccountName }}</p>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?=asset('scripts/angular/controllers/product-controller.js')?>"></script>
    <script type="text/javascript">
        var SearchProducts = "<?=action('ProductController@PostJsonProducts')?>";

    </script>

@endsection