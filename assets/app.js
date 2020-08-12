function myFunction(val) {
  var id = val;
    // console.log(id);
    $.ajax({
      type: "POST",
      url: "pdf.php",
      data: {id: id},
      success: function(msg) {
        $("#ab_quantity").val(msg);
      }
    });
    
  }

  function pdfConvert(){
    // var doc = new jsPDF();
    // var elementHTML = $('#content').html();
    // var specialElementHandlers = {
    //   '#elementH': function(element, renderer){
    //     return true;
    //   }
    // };
    // doc.fromHTML(elementHTML, 15, 15, {
    //   'width': 170,
    //   'elementHandlers': specialElementHandlers
    // });
    // doc.save('sample.pdf');
    var options = {
       // 'width': 800,
    };
    var pdf = new jsPDF('p', 'pt', 'a4');
    pdf.addHTML($("#content"), -1, 220, options, function() {
      pdf.save('sample.pdf');
    });
  }
