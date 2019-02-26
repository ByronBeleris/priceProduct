@extends('layouts.app')


@section('content')
    <div class="row" ng-controller="PriceController">
        <div class="container" ng-cloak>
            <br>
            <div class="row">
                    <div class="col-sm-3">
                            <input ng-model="search" id="search" class="form-control" placeholder="Search">
                        </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1">
                    <select ng-model="resultSize" id="resultSize" class="form-control">
                        <option ng-value="5">5</option>
                        <option ng-value="10">10</option>
                        <option ng-value="15">15</option>
                        <option ng-value="20">20</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row" style="text-align: center">
                    <table  class="table">
                        <thead>
                        <tr>
                            <th>sku</th>
                            <th>account</th>
                            <th>price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="item in prices | filter:search | StartFrom:currentPage*resultSize | limitTo:resultSize">
                            <td>@{{ item.sku }}</td>
                            <td>@{{ item.account }}</td>
                            <td>@{{ item.price | number : 2 }}</td>
                        </tr>
                        </tbody>
                    </table>
            </div>
            <div class="row" style="justify-content:center;">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link"
                               ng-disabled="currentPage == 0"
                               ng-click="currentPage=currentPage-1"
                               style="cursor: pointer;">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" readonly="">@{{currentPage+1}}/@{{numberOfPages()}}</a></li>
                        <li class="page-item">
                            <a class="page-link"
                               ng-disabled="currentPage >= prices.length/resultSize - 1"
                               ng-click="currentPage=currentPage+1"
                               style="cursor: pointer;">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script type="text/javascript" src="<?=asset('scripts/angular/controllers/price.js')?>"></script>
@endsection