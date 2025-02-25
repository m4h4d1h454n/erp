
// 1st card DOM create  //
function testResults (form, form2) {
    var seller = form.seller.value;
    var email = form2.email.value;
    var pass = form.pass.value;
    var date = form.date.value;
    var price = form.price.value;

    var q = null;
      if (seller == "" | email == "" | pass == "" | date == "" | price == "") 
      {
          alert ("***********************************\n***** Please Provide All Data *****\n***********************************");
      }
      else {
        const url = "http://65.0.130.124:82/stock_entry?seller="+seller+"&email="+email+"&pass="+pass+"&start_date="+date+"&price="+price
        var reply = "\n\nSeller Name: "+seller+"\nE-mail: "+email+"\nPassword: "+pass+"\nstart_date: "+date+"\n\n*****************************"
        fetch(url);
        alert ("***** Confirm Your Data *****" + reply);
      }

}


function testResults2 (form) {
    var email = form.email.value;

    var q = null;
      if (email == "") 
      {
          alert ("***********************************\n***** Please Provide All Data *****\n***********************************");
      }
      else {
        const url = "http://65.0.130.124:82/stock_renew?email="+email
        var reply = "\n"+email+"\n*****************************"
        fetch(url);
        alert ("***** Netflix Stock Renewed *****" + reply);
      }
}


function testResults4 (form, form, form, form, form, form, form, form) {
    var profile = form.profile.value;
    var user_name = form.user_name.value;
    var contact = form.contact.value;
    var packagess = form.packagess.value;
    var date = form.date.value;
	var price = form.price.value;
    var pin = form.pin.value;
    var user_from = form.user_from.value;

    var q = null;
      if (profile == "" | user_name == "" | contact == "" | date == "" | price == "") 
      {
          alert ("***********************************\n***** Please Provide All Data *****\n***********************************");
      }
      else {
        #const url = "http://65.0.130.124:82/stock_entry?seller="+seller+"&email="+email+"&pass="+pass+"&start_date="+date+"&price="+price
        var reply = "\n\nSeller Name: "+profile+"\nE-mail: "+user_name+"\nPassword: "+contact+"\nstart_date: "+packagess+"\n\n*****************************"+date+price+pin+user_from
        #fetch(url);
        alert ("***** Confirm Your Data *****" + reply);
      }

}




