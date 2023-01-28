var supplyCount = 0;
var priceTotal = 0;
var quantity = 0;
var clone = "";
//CART INDEX
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/shop",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                // console.log(key);
                id = value.supply_id;

                var supply = "<div class='supply'><div class='supplyDetails'><div class='supplyImage'><img src=" + "/storage/"
                    + value.img_path + " width='100px', height='400px,' border='10px solid,'/></div><div class='supplyText'><p class='price-container'>Price: Php <span class='price'>"
                    + value.price + "</span></p><p>Supply Description: "
                    + value.description + "</p></div>Quantity: <input type='number' class='qty' name='quantity' min='1' max='5'><p class='supplyId'>"
                    + value.supply_id + "</p>      </div><button type='button' class='btn btn-primary add' >Add to cart</button></div>";

                $("#supplies").append(supply);
                // <img src="/storage/' + JsonResultRow.imagePath + '" width="100px" height="100px">';

            });

        },
        error: function (error) {
            console.log(error);
            alert("error");
        }
    });

    //CART
    $("#supplies").on('click', '.add', function () {
        supplyCount++;
        $('#supplyCount').text(supplyCount).css('display', 'block');
        clone = $(this).siblings().clone().appendTo('#cartSupplies')
            .append('<button class="removesupply">Remove Supply</button>');
        var price = parseInt($(this).siblings().find('.price').text());
        priceTotal += price;
        $('#cartTotal').text("Total: ₱ " + priceTotal);
    });//end

    //REMOVE
    $('#shoppingCart').on('click', '.removesupply', function () {
        $(this).parent().remove();
        supplyCount--;
        $('#supplyCount').text(supplyCount);

        // Remove Cost of Deleted supply from Total Price
        var price = parseInt($(this).siblings().find('.price').text());
        priceTotal -= price;
        $('#cartTotal').text("Total: ₱" + priceTotal);

        if (supplyCount == 0) {
            $('#supplyCount').css('display', 'none');
        }
    });//end

    //EMPTY
    $('#emptyCart').click(function () {
        supplyCount = 0;
        priceTotal = 0;

        $('#supplyCount').css('display', 'none');
        $('#cartSupply').text('');
        $('#cartTotal').text("Total: ₱" + priceTotal);
    });//end

    //CHECKOUT
    $('#checkout').click(function () {
        supplyCount = 0;
        priceTotal = 0;
        let supplies = new Array();

        $("#cartSupplies").find(".supplyDetails").each(function (i, element) {
            console.log(element);
            let supplyid = 0;
            let qty = 0;

            qty = parseInt($(element).find($(".qty")).val());
            supplyid = parseInt($(element).find($(".supplyId")).html());

            supplies.push(
                {
                    "supply_id": supplyid,
                    "quantity": qty
                }
            );

        });

        console.log(JSON.stringify(supplies));
        var data = JSON.stringify(supplies);

        $.ajax({
            type: "POST",
            url: "/api/supply/checkout",
            data: data,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            processData: false,
            contentType: 'application/json; charset=utf-8',
            success: function (data) {
                console.log(data);
                alert(data.status);
            },
            error: function (error) {
                // alert(data.status);
                console.log(error);

            }
        });
        $('#supplyCount').css('display', 'none');
        $('#cartSupplies').text('');
        $('#cartTotal').text("Total: $" + priceTotal);

        // console.log(clone.find(".productDetails"));

    });//end

    $('.openCloseCart').click(function () {
        $('#shoppingCart').toggle();
    });//end
})