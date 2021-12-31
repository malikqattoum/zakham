$( document ).ready(function() {
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 1; //Initial field counter is 1
    var idCounter = 1;

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            var original = document.getElementById('categoriesContainer');
            var clone = original.cloneNode(true);
            clone.id = original.id+idCounter;
            var fieldHTML = document.createElement("div");
            fieldHTML.appendChild(clone); //New input field html
            fieldHTML.insertAdjacentHTML('beforeend', '<a href="javascript:void(0);" class="remove_button float-right mb-2">ازالة التصنيف</a></div>');
            x++; //Increment field counter
            idCounter++;
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    $(wrapper).on('click', '.remove_added_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
    });

});

function categoriesChange(el)
{
  var parentId = el.parentNode.id;
  $('#'+parentId+' div[class*="_subcategory"]').not('div[class*="d-none"]').addClass("d-none");
  if(!$('#'+parentId+" ."+el.value+"_subcategory").length)
  {
      if(!$('#'+parentId+" .subcategories-group").hasClass("d-none"))
          $('#'+parentId+" .subcategoriesGroup").addClass("d-none");
      return;
  }
  $('#'+parentId+" ."+el.value+"_subcategory").removeClass("d-none");
  $('#'+parentId+" .subcategories-group").removeClass("d-none");
}

function removeElement(elem){
    elem.parentNode.removeChild(elem);
}