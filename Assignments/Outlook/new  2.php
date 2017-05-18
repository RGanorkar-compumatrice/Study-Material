



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>


    <style type="text/css">
        .row-highlight
        {
            background-color: Yellow;
        }
    </style>


    <script type="text/javascript">
        $(function() {
		var name='';
		    alert("inside function");
            //var message = $('#message');
            var tr = $('#tbl').find('tr');
            tr.click( function( ) {
                var values = '';
				alert("inside click");
                tr.removeClass('row-highlight');
                var tds = $(this).addClass('row-highlight').find('td');
                

                $.each(tds, function(index, item) {
                    values = values + 'td' + (index + 1) + ':' + item.innerHTML + '<br/>';
					name=item.innerHTML;
					return false;
                });
                document.getElementById("")


            });
        });
        

    </script>


</head>
<body>
    <form id="form1" runat="server">
    <table id="tbl" style="border: solid 1px black">
        <tr>
            <td>
                1
            </td>
            <td>
                a
            </td>
        </tr>
        <tr>
            <td>
                2
            </td>
            <td>
                b
            </td>
        </tr>
        <tr>
            <td>
                3
            </td>
            <td>
                c
            </td>
        </tr>
    </table>
    <br />
    <div ><textarea id="message" rows="5" cols="60" style="margin-left:0px;" name="text"></textarea>
    </div>
    </form>
</body>
</html>