// const { Toast } = require("bootstrap");
let Toast;

$(document).ready(function(){
    Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        iconColor: "white",
        customClass: {
            popup: "colored-toast",
        },
        showConfirmButton: false,
        timer: 3000,
    });
  
});

function incrementDecrementBtn(id, btn) {
    let qty = document.getElementById("Quantity" + id).value;
    // console.log(id);
    // console.log(btn);
    if (btn === "minus" && qty > 1) {
        qty--;
    } else if (btn === "plus") {
        qty++;
    }
    document.getElementById("Quantity" + id).value = qty;
}

function addToCart(id)
{
    console.log(id);
    let quantity = document.getElementById("Quantity" + id).value;
    let token = document.getElementById("accessToken").value;

    console.log(quantity);

    let data = {
        Quantity: quantity,
    };

    if (id && token && quantity) {
        $.ajax({
            type: "GET",
            headers: { Authorization: `Bearer ${token}` },
            url: "/api/add-to-cart/" + id,
            data: data,
            success: function (response) {
                console.log(response);
                Toast.fire({
                    icon: "success",
                    title: '<i class="fas fa-shopping-cart me-3"></i> Added to Cart',
                });
                document.getElementById("cart_badge").innerHTML =
                    response.item_count;
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
}

// $(document).ready(function () {
//     let path = window.location.pathname;
//     let c = path.split("/");
//     let length = c.length - 1;
//     let cls = c[length];
//     $(`#${cls}`).addClass("active");

//     if (cls == "product-size") {
//         $("#products").addClass("menu-open");
//     } else if (cls == "approved-vendors" || cls == "pending-vendors") {
//         $("#vendors").addClass("menu-open");
//     }
// });