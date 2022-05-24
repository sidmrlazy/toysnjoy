function pay_now() {
  var af_child_name = jQuery("#af_child_name").val();
  var af_child_gender = jQuery("#af_child_gender").val();
  var af_mother_name = jQuery("#af_mother_name").val();
  var af_mother_contact = jQuery("#af_mother_contact").val();
  var af_mother_occupation = jQuery("#af_mother_occupation").val();
  var af_father_name = jQuery("#af_father_name").val();
  var af_father_contact = jQuery("#af_father_contact").val();
  var af_father_occupation = jQuery("#af_father_occupation").val();
  var af_address = jQuery("#af_address").val();
  var af_distance = jQuery("#af_distance").val();

  var af_member_one_name = jQuery("#af_member_one_name").val();
  var af_member_one_age = jQuery("#af_member_one_age").val();
  var af_member_one_relation = jQuery("#af_member_one_relation").val();
  var af_member_one_occupation = jQuery("#af_member_one_occupation").val();

  var af_member_two_name = jQuery("#af_member_two_name").val();
  var af_member_two_age = jQuery("#af_member_two_age").val();
  var af_member_two_relation = jQuery("#af_member_two_relation").val();
  var af_member_two_occupation = jQuery("#af_member_two_occupation").val();

  var af_member_three_name = jQuery("#af_member_three_name").val();
  var af_member_three_age = jQuery("#af_member_three_age").val();
  var af_member_three_relation = jQuery("#af_member_three_relation").val();
  var af_member_three_occupation = jQuery("#af_member_three_occupation").val();

  var af_member_four_name = jQuery("#af_member_four_name").val();
  var af_member_four_age = jQuery("#af_member_four_age").val();
  var af_member_four_relation = jQuery("#af_member_four_relation").val();
  var af_member_four_occupation = jQuery("#af_member_four_occupation").val();

  var af_emergency_name = jQuery("#af_emergency_name").val();
  var af_emergency_contact = jQuery("#af_emergency_contact").val();
  var af_emergency_relation = jQuery("#af_emergency_relation").val();
  var af_class = jQuery("#af_class").val();

  jQuery.ajax({
    type: "post",
    url: "admissions.php",
    data:
      "af_child_name=" +
      af_child_name +
      "&af_child_gender=" +
      af_child_gender +
      "&af_mother_name=" +
      af_mother_name +
      "&af_mother_contact=" +
      af_mother_contact +
      "&af_mother_occupation=" +
      af_mother_occupation +
      "&af_father_name=" +
      af_father_name +
      "&af_father_contact=" +
      af_father_contact +
      "&af_father_occupation=" +
      af_father_occupation +
      "&af_address=" +
      af_address +
      "&af_distance=" +
      af_distance +
      "&af_member_one_name=" +
      af_member_one_name +
      "&af_member_one_age=" +
      af_member_one_age +
      "&af_member_one_relation=" +
      af_member_one_relation +
      "&af_member_one_occupation=" +
      af_member_one_occupation +
      "&af_member_two_name=" +
      af_member_two_name +
      "&af_member_two_age=" +
      af_member_two_age +
      "&af_member_two_relation=" +
      af_member_two_relation +
      "&af_member_two_occupation=" +
      af_member_two_occupation +
      "&af_member_three_name=" +
      af_member_three_name +
      "&af_member_three_age=" +
      af_member_three_age +
      "&af_member_three_relation=" +
      af_member_three_relation +
      "&af_member_three_occupation=" +
      af_member_three_occupation +
      "&af_member_four_name=" +
      af_member_four_name +
      "&af_member_four_age=" +
      af_member_four_age +
      "&af_member_four_relation=" +
      af_member_four_relation +
      "&af_member_four_occupation=" +
      af_member_four_occupation +
      "&af_emergency_name=" +
      af_emergency_name +
      "&af_emergency_contact=" +
      af_emergency_contact +
      "&af_emergency_relation=" +
      af_emergency_relation +
      "&af_class=" +
      af_class,
    success: function (result) {
      var options = {
        key: "rzp_live_ReANxY0HTVzNPf",
        amount: "50000",
        currency: "INR",
        name: "Toys N Joy Play School",
        description: "The best neighbourhood play school",
        image: "https:toysnjoy.in/assets/images/logo/logo.png",
        handler: function (response) {
          jQuery.ajax({
            type: "post",
            url: "admissions.php",
            data: "af_payment_id=" + response.razorpay_payment_id,
            success: function (result) {
              console.log(result);
              window.location.href = "admissions.php";
            },
          });
        },
        theme: {
          color: "#eb4634",
        },
      };

      var rzp1 = new Razorpay(options);
      rzp1.open();
    },
  });
}
