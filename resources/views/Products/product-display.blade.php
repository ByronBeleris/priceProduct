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
                    <input type="text" class="form-control" ng-model="products.accountNumber"/>
                </div>
                <br>
            </div>
            <br>
            <div class="row" style="justify-content:center;">
                <button class="btn btn-success" ng-click="search()">Search</button>
            </div>
            <br>
            <div class="row" style="text-align: center" ng-if="productModels != null">
                <table  class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>AccountNumber</th>
                        <th>AccountName</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="model in productModels">
                        <td>@{{ model.Id }}</td>
                        <td>@{{ model.Name }}</td>
                        <td>@{{ model.Description }}</td>
                        <td>@{{ model.Sku}}</td>
                        <td>@{{ model.Price | number : 2 }}</td>
                        <td>@{{ model.AccountNumber}}</td>
                        <td>@{{ model.AccountName }}</td>
                        <td ng-if="!model.InDatabase && !model.InLive">Base Price</td>
                        <td ng-if="model.InDatabase">Database Price</td>
                        <td ng-if="model.InLive">Live Price</td>
                    </tr>
                    </tbody>
                </table>
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