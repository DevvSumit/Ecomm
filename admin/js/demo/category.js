 function myFunction(){
        if(form.category_name.value ==="" || form.file.value === "")
        {
            alert("Datafields cannot be empty");
            return false;
        }
        else if(form.category_name.value === ""){
            alert("please fill in category name");
        }
        else if(form.file.value === ""){
            alert("please choose Category Image");
        }
        else{
            return true;
        }
        
    }


//for modal
  