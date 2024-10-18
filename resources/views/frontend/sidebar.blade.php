<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categories as $category)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#category_{{$category->id}}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{$category->name}}
                        </a>
                    </h4>
                </div>
                <div id="category_{{$category->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
@foreach( $category->subcategories as  $category->subcategory  )


                            <li><a href="{{URL::to('/')}}?filter_subcategory={{$category->subcategory->name}}&&filter_category={{$category->name}}">{{$category->subcategory->name}}</a></li>

@endforeach

                        </ul>
                    </div>
                </div>
            </div>

            @endforeach



        </div><!--/category-products-->

<form action="/price_filter" method="post">
    <div class="price-range">
    <h2>Price Filter</h2>
    <div class="input-group">
				  <span class="input-group-addon primary">
				  <span class="arrow"></span>
					<i class="fa fa-align-justify"></i>
				  </span>
        <input type="number" name="max" class="form-control" placeholder="Max price">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="filter_category" value="{{Input::get('filter_category')}}">
        <input type="hidden" name="filter_subcategory" value="{{Input::get('filter_subcategory')}}">

    </div>
    <div class="input-group" style="padding-top: 10px">
				  <span class="input-group-addon primary">
				  <span class="arrow"></span>
					<i class="fa fa-align-justify"></i>
				  </span>
        <input type="number" name="min" class="form-control" placeholder="Min price">
    </div>

        <div class="pull-right" style="padding-top: 10px">

            <button type="submit" class="btn btn-default"><i class="fa fa-filter"></i></button>

        </div>
        </div>

</form>




    </div>
</div>