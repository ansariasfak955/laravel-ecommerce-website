<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="{{ route('cart') }}"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
      @isset($categories)
      @foreach($categories as $category)
        <li class="subMenu open"><a> {{ $category->name }}</a>
          @foreach($category_id as $categoryId)
            @if($categoryId->category_id == $category->id)
              <ul>
              <li><a class="active" href="{{ url('products/'.$categoryId->id) }}"><i class="icon-chevron-right"></i>{{ $categoryId->name }} </a></li>
              </ul>
            @endif
          @endforeach
        </li>
        @endforeach
        @endisset
        {{-- <li class="subMenu"><a> CLOTHES [840] </a>
        <ul style="display:none">
            <li><a href=""><i class="icon-chevron-right"></i>Women's Clothing (45)</a></li>
            <li><a href=""><i class="icon-chevron-right"></i>Women's Shoes (8)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>Women's Hand Bags (5)</a></li>	
            <li><a href=""><i class="icon-chevron-right"></i>Men's Clothings  (45)</a></li>
            <li><a href=""><i class="icon-chevron-right"></i>Men's Shoes (6)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>Kids Clothing (5)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>												
        </ul>
        </li>
        <li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
            <ul style="display:none">
            <li><a href=""><i class="icon-chevron-right"></i>Angoves  (35)</a></li>
            <li><a href=""><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>	
            <li><a href=""><i class="icon-chevron-right"></i>Louis Bernard  (45)</a></li>
            <li><a href=""><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>Garden (3)</a></li>												
            <li><a href=""><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>												
        </ul>
        </li>
        <li><a href="">HEALTH & BEAUTY [18]</a></li>
        <li><a href="">SPORTS & LEISURE [58]</a></li>
        <li><a href="">BOOKS & ENTERTAINMENTS [14]</a></li> --}}
    </ul>
    <br/>
      <div class="thumbnail">
        <img src="themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
        <div class="caption">
          <h5>Panasonic</h5>
            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
        </div>
      </div><br/>
        <div class="thumbnail">
            <img src="themes/images/products/kindle.png" title="Bootshop New Kindel" alt="Bootshop Kindel">
            <div class="caption">
              <h5>Kindle</h5>
                <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
            </div>
          </div><br/>
        <div class="thumbnail">
            <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
            <div class="caption">
              <h5>Payment Methods</h5>
            </div>
          </div>
</div>