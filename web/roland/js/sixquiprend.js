/*$(document).ready(function()
{
  $('#merge').off('submit').submit(function()
  {
    var href=$(this).attr('action');
    var rect = document.getElementById('fond').getBoundingClientRect();
    var photo_width=$('#photo').width();
    var photo_height=$('#photo').height();
    var fond_width=$('#fond').width();
    var fond_height=$('#fond').height();
    var photo_x=$('#photo').attr('data-x');
    var photo_y=$('#photo').attr('data-y');

    console.log(photo_width,photo_height,fond_width,fond_height);
    $.post({'url':href,
            //{
              photo_width:$('#photo_width').val(photo_width),
              photo_height:$('#photo_height').val(photo_height),
              fond_width:$('#fond_width').val(fond_width),
              fond_height:$('#fond_height').val(fond_height),
              fond_top:$('#fond_top').val(parseInt(rect.top)),
              fond_left:$('#fond_left').val(parseInt(rect.left)),
              photo_x:$('#photo_x').val(photo_x),
              photo_y:$('#photo_y').val(photo_y)
            //}
          });
  })
})


  function dragMoveListener (event) {

    
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';
    // update the posiion attributes
    target.style.zIndex=10;
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);

  }

  interact('.resize-drag')
  .draggable({
    onmove: window.dragMoveListener,
  
  onend: function(event){
    $('#photo').css("z-index","101");
  }})
  .on('tap', function(){
    var index=$("#photo").css('z-index');
    //alert(index);
    if(index=="10")
      $('#photo').css("z-index","101");
    else
      {
        $('#photo').css("z-index","10");
        $('#fond').off('click').click(function()
        {
          $('#photo').css("z-index","101");
        })
      }
  })
  .resizable({
    edges: { left: true, right: true, bottom: true, top: true }
  })
  .on('resizemove', function (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0),
        y = (parseFloat(target.getAttribute('data-y')) || 0);
    // update the element's style
    target.style.width  = event.rect.width + 'px';
    target.style.height = 'auto';

    // translate when resizing from top or left edges
    x += event.deltaRect.left;
    y += event.deltaRect.top;

    target.style.webkitTransform = target.style.transform =
        'translate(' + x + 'px,' + y + 'px)';

    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
    target.textContent = event.rect.width + '×' + event.rect.height;
  })

  
  



  // this is used later in the resizing demo
  window.dragMoveListener = dragMoveListener;*/


