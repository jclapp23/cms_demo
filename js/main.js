  $(document).ready(function(){

	var $container = $('#services');
            $container.isotope({
            itemSelector: '.service_columns'
          });
      
        //.. every time the selected value changes for the dropdown menu on portfolio.php page, set $_GET['filter'] to whatever is selected 
        $('.prior-stone-masonry-project-portfolio #filter').change(function(){
              window.location.replace("http://www.jmcdesignstudios.com/cms_demo/prior-stone-masonry-project-portfolio/service-type-"+$('select').val()+"/");
         });
  
      //prompt user to make sure they really want to delete items
        $('.delete').click(function(event){
            if(!confirm("Do you really want to delete this item?")){
              return false;
            };
          });
          
        $('#login').click(function(){
            alert("I don't do anything yet");
          });
        $('#logout').click(function(){
            alert("I don't do anything yet");
          });
            
      
        
        /* Activate jQuery validate plugin */
  
        // ..then find the registration form..
        $('#add_form')
        // ..and provide validation with the validate plugin
        .validate({
          rules:
          {
            // 'service_keyword' is required, but can be anything
            service_keyword: "required",
            
            project_date:
            {
              // 'date' field is required, and must be a valid date
              required: true,
              date: true
            },
            
            portfolio_description: "required",
            image_1: "required"
            
          },
          
          // These are the errors messages displayed to the user
          messages:
          {
            service_keyword: "Please select a service keyword",
            project_date: "Please select the date of project completion",
            portfolio_description: "Please enter a portfolio description",
            image_1: "Please include at least one image to display"
            
          }
        });
      
      $('#edit_form')
        // ..and provide validation with the validate plugin
        .validate({
          rules:
          {
            // 'service_keyword' is required, but can be anything
            service_keyword: "required",
            
            project_date:
            {
              // 'date' field is required, and must be a valid date
              required: true,
              date: true
            },
            
            portfolio_description: "required",
            
          },
          
          // These are the errors messages displayed to the user
          messages:
          {
            service_keyword: "Please select a service keyword",
            project_date: "Please select the date of project completion",
            portfolio_description: "Please enter a portfolio description",
            
          }
        });
        
        jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
          phone_number = phone_number.replace(/\s+/g, ""); 
          return this.optional(element) || phone_number.length > 9 &&
            phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
        }, "Please specify a valid phone number");
        
        $('#contact_form')
        // ..and provide validation with the validate plugin
        .validate({
          rules:
          {
            // 'service_keyword' is required, but can be anything
            name: "required",
            
            phone:
            {
              // 'date' field is required, and must be a valid date
              required: true,
              phoneUS: true
            },
            
            email: "required"
          
          },
          
          // These are the errors messages displayed to the user
          messages:
          {
            name: "Please enter a name",
            phone: "Please enter a valid US phone number including area code",
            email: "Please enter a valid email",
            comments: "Please enter comments"
          }
        });
        
       
        $.validator.addMethod(
                  'noPlaceholder', 
                   function (value, element)
                   {
                     return value !== "none"; 
                   }, 
                   'Please select a service.' 
                );      
 
       $('#submit_contact').click(function(event){
            var message = $("#comments").val();
            if (message == "") {
              $("#message_error").show();
              $("#comments").focus();
              event.preventDefault();
            }
          });
        
        //jquery landscape gallery plugin for home page
         $('.flexslider').flexslider({
              animation: "fade"
            });
            
            $('#slider').slider();
  		
	
     
      
      }); // end doc rdy
  
