html2canvas([document.getElementById('MerahPutihImg')], {
    onrendered: function (canvas) {
    document.getElementById('img-rwf').appendChild(canvas);
    var data = canvas.toDataURL('image/png');
     //display 64bit imag
     var image = new Image();
    image.src = data;
    document.getElementById('imgAja').appendChild(image);
    document.getElementById('MerahPutihImg').style.display = 'none';
    $.post("saveimg.php", {
      imageData : data
    }, function(data) {
      //window.location = data;
    });
    // AJAX call to send `data` to a PHP file that creates an PNG image from the dataURI string and saves it to a directory on the server
    //var ajax = new XMLHttpRequest();
    //ajax.open("POST",'saveimg.php',false);
    //ajax.setRequestHeader('Content-Type', 'application/upload');
    //ajax.send( data );
  }
});