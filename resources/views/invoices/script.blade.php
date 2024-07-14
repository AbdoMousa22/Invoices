<script>
        $(document).ready(function() {
            $('.Section').on('change', function() {
                var sections_id=$(this).val();
                console.log(sections_id);
                $.ajax({


                    url:"{{route('data/data_ajax')}}",
                    method:"POST",
                    data:{sections_id:sections_id , _token:'{{csrf_token()}}'},
                    dataType:"json",

                    success:function(data){
                        // console.log(data)
                        $('#product').empty();

                            $.each(data, function(key, value) {
                                $('#product').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });

                    }

                });




            });

        });

 </script>

 <script>
 function myFunction(){

    var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
    var Discount          = parseFloat(document.getElementById("Discount").value);
    var Rate_VAT          = parseFloat(document.getElementById("Rate_VAT").value);
    var Value_VAT          = parseFloat(document.getElementById("Value_VAT").value);

    

   var Amount_Commission2=Amount_Commission-Discount;


    if(Amount_Commission2==='undefined'|| !Amount_Commission2){
                alert('يرجي ادخال مبلغ العمولة ');

    }
    else{
        var intResults = Amount_Commission2 * Rate_VAT / 100;
        var intResults2 = parseFloat(intResults + Amount_Commission2);

        sumq = parseFloat(intResults).toFixed(2);

        sumt = parseFloat(intResults2).toFixed(2);

        document.getElementById("Value_VAT").value = sumq;

        document.getElementById("Total").value = sumt;

    }
 }



 </script>

