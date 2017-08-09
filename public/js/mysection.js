    /**
     * Created by sajeeb on 4/30/2017.
     */
    $(document).ready(function(){

        var selector = localStorage.getItem('div_selector');
        console.log(selector);
        if(selector == "pi"){
             if(!$('#pi').hasClass('active')){
             $("#pi").addClass('active');
             $("#academic").removeClass('active');
             $("#experience").removeClass('active');
             $("#skill").removeClass('active');
             $("#training").removeClass('active');
             $("#reference").removeClass('active');
             }



             $("#pibody").show('slow');
             $('#academicbody').hide('slow');
             $('#experiencebody').hide('slow');
             $('#skillbody').hide('slow');
             $('#trainingbody').hide('slow');
             $('#referencebody').hide('slow');
             console.log(selector);
             }else if(selector == "academic"){
             if(!$('#academic').hasClass('active')){
             $("#academic").addClass('active');
             $("#pi").removeClass('active');
             $("#experience").removeClass('active');
             $("#skill").removeClass('active');
             $("#training").removeClass('active');
             $("#reference").removeClass('active');
             }
             $("#academicbody").show('slow');
             $('#pibody').hide('fast');
             $('#experiencebody').hide('slow');
             $('#skillbody').hide('slow');
             $('#trainingbody').hide('slow');
             $('#referencebody').hide('slow');
             console.log(selector);
             }else if(selector == "experience"){
             if(!$('#experience').hasClass('active')){
             $("#experience").addClass('active');
             $("#pi").removeClass('active');
             $("#academic").removeClass('active');
             $("#skill").removeClass('active');
             $("#training").removeClass('active');
             $("#reference").removeClass('active');
             }


             $("#experiencebody").show('slow');
             $('#academicbody').hide('slow');
             $('#pibody').hide('slow');
             $('#skillbody').hide('slow');
             $('#trainingbody').hide('slow');
             $('#referencebody').hide('slow');
             console.log(selector);
             }else if(selector == "skill"){
             $("#skill").addClass('active');
             $("#pi").removeClass('active');
             $("#experience").removeClass('active');
             $("#academic").removeClass('active');
             $("#training").removeClass('active');
             $("#reference").removeClass('active');
             
             $("#skillbody").show('slow');
             $('#academicbody').hide('slow');
             $('#experiencebody').hide('slow');
             $('#pibody').hide('slow');
             $('#trainingbody').hide('slow');
             $('#referencebody').hide('slow');
             console.log(selector);
             }else if(selector == "training"){
             $("#training").addClass('active');
             $("#pi").removeClass('active');
             $("#experience").removeClass('active');
             $("#skill").removeClass('active');
             $("#academic").removeClass('active');
             $("#reference").removeClass('active');

             $("#trainingbody").show('slow');
             $('#academicbody').hide('slow');
             $('#experiencebody').hide('slow');
             $('#skillbody').hide('slow');
             $('#pibody').hide('slow');
             $('#referencebody').hide('slow');
             console.log(selector);
             }else if(selector == "reference" ){
             $("#reference").addClass('active');
             $("#pi").removeClass('active');
             $("#experience").removeClass('active');
             $("#skill").removeClass('active');
             $("#training").removeClass('active');
             $("#academic").removeClass('active');

             $("#referencebody").show('slow');
             $('#academicbody').hide('slow');
             $('#experiencebody').hide('slow');
             $('#skillbody').hide('slow');
             $('#trainingbody').hide('slow');
             $('#pibody').hide('slow');
             console.log(selector);
         }



        $('#academic').click(function(){
            localStorage.setItem("div_selector","academic");
            $(this).addClass('active');
            $("#pi").removeClass('active');
            $("#experience").removeClass('active');
            $("#skill").removeClass('active');
            $("#training").removeClass('active');
            $("#reference").removeClass('active');
            $("#academicbody").show('slow');
            $('#pibody').hide('fast');
            $('#experiencebody').hide('slow');
            $('#skillbody').hide('slow');
            $('#trainingbody').hide('slow');
            $('#referencebody').hide('slow');

            //alert();

        });

        $('#experience').click(function(){
            localStorage.setItem("div_selector","experience");
            $(this).addClass('active');
            $("#pi").removeClass('active');
            $("#academic").removeClass('active');
            $("#skill").removeClass('active');
            $("#training").removeClass('active');
            $("#reference").removeClass('active');

            $("#experiencebody").show('slow');
            $('#academicbody').hide('slow');
            $('#pibody').hide('slow');
            $('#skillbody').hide('slow');
            $('#trainingbody').hide('slow');
            $('#referencebody').hide('slow');

            //alert();

        });
        $('#skill').click(function(){
            localStorage.setItem("div_selector","skill");
            $(this).addClass('active');
            $("#pi").removeClass('active');
            $("#experience").removeClass('active');
            $("#academic").removeClass('active');
            $("#training").removeClass('active');
            $("#reference").removeClass('active');

            $("#skillbody").show('slow');
            $('#academicbody').hide('slow');
            $('#experiencebody').hide('slow');
            $('#pibody').hide('slow');
            $('#trainingbody').hide('slow');
            $('#referencebody').hide('slow');

            //alert();

        });
        $('#training').click(function(){
            localStorage.setItem("div_selector","training");
            $(this).addClass('active');
            $("#pi").removeClass('active');
            $("#experience").removeClass('active');
            $("#skill").removeClass('active');
            $("#academic").removeClass('active');
            $("#reference").removeClass('active');

            $("#trainingbody").show('slow');
            $('#academicbody').hide('slow');
            $('#experiencebody').hide('slow');
            $('#skillbody').hide('slow');
            $('#pibody').hide('slow');
            $('#referencebody').hide('slow');

            //alert();

        });
        $('#reference').click(function(){
            localStorage.setItem("div_selector","reference");
            $(this).addClass('active');
            $("#pi").removeClass('active');
            $("#experience").removeClass('active');
            $("#skill").removeClass('active');
            $("#training").removeClass('active');
            $("#academic").removeClass('active');

            $("#referencebody").show('slow');
            $('#academicbody').hide('slow');
            $('#experiencebody').hide('slow');
            $('#skillbody').hide('slow');
            $('#trainingbody').hide('slow');
            $('#pibody').hide('slow');

            //alert();

        });
        $('#pi').click(function(){
            localStorage.setItem("div_selector","pi");
            $(this).addClass('active');
            $("#academic").removeClass('active');
            $("#experience").removeClass('active');
            $("#skill").removeClass('active');
            $("#training").removeClass('active');
            $("#reference").removeClass('active');

            $("#pibody").show('slow');
            $('#academicbody').hide('slow');
            $('#experiencebody').hide('slow');
            $('#skillbody').hide('slow');
            $('#trainingbody').hide('slow');
            $('#referencebody').hide('slow');

            //alert();

        });


    });
