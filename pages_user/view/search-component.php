<?php ?>
<div class="input-group input-group-sm ">
              <span class="pl-0 pr-0 pb-0 col-3">
                <input class="form-control form-control-navbar" id="inputText" onkeyup="searchFunction()"
                       style="font-size: 18px;height: 38px;" type="search"
                       placeholder="Search" aria-label="Search">
              </span>
  <span class="pl-1 pb-0 align-self-center">
                <ion-icon name="search-sharp"
                          style="height: 35px;font-size: 26px;--ionicon-stroke-width: 30px;color: darkgrey ">
                </ion-icon>
              </span>
</div>

<script>
  function searchFunction() {
    var input,filter,i,txtVal,div,count = 0;
    input = document.getElementById("inputText");
    filter = input.value.toUpperCase();
    div = document.getElementsByClassName("dataShow");

    for(i=0;i<div.length;i++){
      txtVal = div[i].textContent || div[i].innerText;
      count++;
      if(txtVal.toUpperCase().indexOf(filter) > -1){
        div[i].style.display = "";
      }
      else{
        div[i].style.display = "none";
        count = 0;
      }
    }
    if(count == 0){
      div = document.getElementsByClassName("boxShow");
      div.style.display = "none";
    }

  }
</script>
