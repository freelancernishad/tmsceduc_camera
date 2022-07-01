<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding: 0;
    --color:#444B8F;
    font-family: 'Kalpurush', sans-serif;

}
.memo {
   width: 500px;
   margin:20px auto;
}.memoHead {
    text-align: center;
    color:var(--color)
}
h1.companiname {
    transform: scaleX(2);
}
p {

    color:var(--color);

}
p.defalttext.address {
    background: var(--color);
    width: 269px;
    margin: 0 auto;
    color: white;
    border-radius: 50px;
    padding: 2px 0px;
}
p.defalttext {
    font-weight: 600;
    font-size: 16px;
    /* transform: scaleX(1.2); */

}


thead {
    background: var(--color);
    color: white;
}

tr {
    border: 1px solid var(--color);
}

th {
    border: 1px solid var(--color);
    border-right: 1px solid white;
}

td {
    border: 1px solid var(--color);
}
table,  td {
  border: 1px solid var(--color);
  border-collapse: collapse;
  text-align: center;
}th, {
  border: 1px solid white;
  border-collapse: collapse;
}

tr {
    height: 27px;
}

</style>


</head>
<body  style="font-family: 'bangla', sans-serif;">
{{-- <button id="pdf">Print</button> --}}

<div id="body">

    <div class="memo" style="">
        <div class="memoHead">
            <h1 class="companiname">মেসার্স এলাহী ট্রেডার্স</h1>
            <p class="defalttext">প্রোঃ শাহ্‌ আলম</p>
            <p class="defalttext">বি. সি. আই. সি. অনুমদিত সার দিলার</p>
            <p class="defalttext address">কালীগঞ্জ বাজার, দেবিগঞ্জ, পঞ্চগড় </p>
            <p class="defalttext">মোবাইল নংঃ ০১৭৪০৯২৯৩০২ </p>

            <div style="display:flex; margin-top:20px">
                <div style="width:350px"></div>

                <p class="slNo">ক্রমিক নংঃ</p>

            </div>

        </div>

        <div class="memobody">
            <div class="customerDetails">
                <p>নামঃ.................................................................................তারিখঃ...........................</p>
                <p>ঠিকানাঃ...............................................................................................................।</p>
            </div>


            <div class="productDetails">
                <table style="border:1px solid var(--color);width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">সংখ্যা</th>
                            <th width="45%">বিবরন</th>
                            <th width="15%">পরিমান</th>
                            <th width="15%">দর</th>
                            <th width="15%">টাকা</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="defalttext" style="text-align:right;    padding: 0 13px;"><p> মোট </p></td>
                            <td></td>
                        </tr>
                    </tfoot>

                </table>
<p style="margin-top:20px">কথাইঃ...............................................................................................................।</p>

            </div>



        </div>
        <div class="memofooter">
            <div style="display:flex; margin-top:20px;width:100%;justify-content: space-around;margin-top:30px">


                <p class="slNo">ক্রেতার সাক্ষর</p>
                <p class="slNo">বিক্রেতার সাক্ষর</p>

            </div>

        </div>

    </div>


</div>



{{--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        $(document).ready(function($) {
            $(document).on('click', '#pdf', function(event){

                event.preventDefault();
                var element = document.getElementById('body');
                var opt = {
                  margin:       0,
                  filename:     'pdf'+'.pdf',
                  image:        { type: '.pdf', quality: 0.2 },
                  html2canvas:  { scale: 2 },
                  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
                html2pdf().set(opt).from(element).save();
            });
        });
    </script> --}}
</body>
</html>
