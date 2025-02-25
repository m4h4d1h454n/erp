
// 1st card DOM create  //
function testResults (form, form2) {
    var seller = form.seller.value;
    var email = form2.email.value;
    var pass = form.pass.value;
    var start_date = form.start_date.value;
    var price = form.price.value;

    var q = null;
      if (seller == "" | email == "" | pass == "" | start_date == "" | price == "") 
      {
          alert ("***********************************\n***** Please Provide All Data *****\n***********************************");
      }
      else {
        const url = "http://65.0.130.124:82/stock_entry?seller="+seller+"&email="+email+"&pass="+pass+"&start_date="+start_date+"&price="+price
        var reply = "\n\nSeller Name: "+seller+"\nE-mail: "+email+"\nPassword: "+pass+"\nstart_date: "+start_date+"\n\n*****************************"
        fetch(url);
        alert ("***** Confirm Your Data *****" + reply);
      }

}




