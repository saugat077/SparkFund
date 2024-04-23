<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Auto Populate Fields</title>
<script>
    function autoPopulate() {
        var value1 = document.getElementById('i1').value;
        var value2 = document.getElementById('i2').value;
        var fileValue = document.getElementById('i3').files[0]; // Get the selected file
        document.getElementById('i4').value = value1;
        document.getElementById('i5').value = value2;
        if (fileValue) {
            document.getElementById('i6').files = document.getElementById('i3').files;
        }
    }
</script>
</head>
<body>

<input type="text" id="i1" placeholder="Input 1" oninput="autoPopulate()"><br>
<input type="text" id="i2" placeholder="Input 2" oninput="autoPopulate()"><br>
<input type="file" id="i3" onchange="autoPopulate()"><br>

<input type="text" id="i4" placeholder="Input 4"><br>
<input type="text" id="i5" placeholder="Input 5"><br>
<input type="file" id="i6"><br>

</body>
</html>
