

//revert back numbers that are superior than 99 //limit the drink order per article
$(function () {
    $(".quantity").keydown(function () {
      // Save old value.
      if (!$(this).val() || (parseInt($(this).val()) <= 99 && parseInt($(this).val()) >= 0))
      $(this).data("old", $(this).val());
    });


    $(".quantity").keyup(function () {
      // Check correct, else revert back to old value.
      if (!$(this).val() || (parseInt($(this).val()) <= 99 && parseInt($(this).val()) >= 0))
        ;
      else
        $(this).val($(this).data("old"));
    });
  });

  
/*****************display drinks depending on category*********************/

var divs = ["Menu1", "Menu2", "Menu3", "Menu4" ,"Menu5", "Menu6", "Menu7", "Menu8"];
var visibleDivId = null;
function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    //visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  var i, divId, div;
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}



/********scroll down to drink list********* */
$(".classic").click(function() {
  $('html,body').animate({
      scrollTop: $(".smooth-scroll").offset().top},
      'slow');
});



/******************************************************************************************************/

// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];
  
  // Constructor
  function Item(name, price, count, prdid, cd2) {
    this.name = name;
    this.price = price;
    this.count = count;
	    this.prdid = prdid;
	    this.cd2 = cd2;

  }
  
  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }
  
    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(name, price, count, prdid, cd2) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(name, price, count, prdid, cd2);
    cart.push(item);
    saveCart();
  }

  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };

  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
  var discper=document.getElementById("discper").value; //returns a HTML DOM Object

    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
	  
    }
	var discamt=(discper/100)*totalCart;
	var newtotal=totalCart-discamt;
	  		document.getElementById('finaltot').value = newtotal;
//shoppingCart.totalCart=newtotal;
//document.getElementById("demo").innerHTML = newtotal;
  //document.getElementById("finaltot").innerHTML= newtotal;
  calldisc(newtotal);
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function(event) {
  event.preventDefault();
  var name = $(this).data('name');
  var price = Number($(this).data('price'));
    var prdid = Number($(this).data('prdid'));
	    var cd2 = Number($(this).data('cd2'));

//alert(prdid);
  shoppingCart.addItemToCart(name, price, 1, prdid,cd2);
  displayCart();
});

// Clear items
$('.clear-cart').click(function() {
  shoppingCart.clearCart();
  displayCart();
});


function displayCart() {
var discper=document.getElementById("discper").value; //returns a HTML DOM Object

//alert(discper);
  var cartArray = shoppingCart.listCart();
  var output = "";
  for(var i in cartArray) {
    output += "<tr><td><input type='text' name='prd_name[]' value='"+ cartArray[i].name +"'hidden><input type='text' name='pro_prc[]' value='"+ cartArray[i].price +"' hidden><input type='text' name='cd1[]' value='"+ cartArray[i].prdid +"' readonly hidden><input type='text' name='cd2[]' value='"+ cartArray[i].cd2 +"' readonly hidden><td>"  
      + "<td>" + cartArray[i].name + "<br>(￥" + cartArray[i].price + ")</td>"  
      + "<td><div class='input-group'><button class='plus-item btn btn-primary input-group-addon' data-name='" + cartArray[i].name + "'>+</button><br>"
      + "<input type='text' readonly='readonly' class='item-count form-control' name='qty[]' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'><br>"
      + "<button class='minus-item input-group-addon btn btn-primary' data-name='" + cartArray[i].name + "'>-</button></div></td>"
      + "<td>￥" + Math.trunc(cartArray[i].total) + "</td>" 
      + "<td><span class='delete-item delete-item-styling btn btn-danger' data-name='" + cartArray[i].name + "'><img src='images/trash.png' alt='削除'></span></td>"
      + "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  

  //  $('.total-cart-disc').html(shoppingCart.totalCart());

  $('.total-count').html(shoppingCart.totalCount());
}

///////////////////////////////////////////////////////////////test
//post back data 


  var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);
    document.getElementById("demo").innerHTML = myObj.name;
  }
};
xmlhttp.open("GET", "demo_file.php", true);
xmlhttp.send();



///////////////////////////////////////////////////////////////test


// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
})

// -1
$('.show-cart').on("click", ".minus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCart(name);
  displayCart();
})

// +1
$('.show-cart').on("click", ".plus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
   var name = $(this).data('name');
   var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

displayCart();


///////////////////////////////////////////////////////////////

function calldisc(val){
//alert(val);
	  		document.getElementById('finaltot').value=val;
//alert(finaltot);

}
//to display cart 
function showcart() {
  div = document.getElementById('tow');
  div.style.display = "block";
}

function gotonextview() {
  document.getElementById("panel").style.display = "none";
}

////////////////////////////////////////////////////////////////
/****** tabs ******/

function openCity(evt, service) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(service).style.display = "block";
  evt.currentTarget.className += " active";
}

///////////////////////////////////////////////////////////////



