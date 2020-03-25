<?php ?>
<div class="input-group input-group-sm ">
              <span class="pl-0 pr-0 pb-0 col-3">
                <input class="form-control form-control-navbar" id="inputText" onkeyup="searchFunction()"
                       style="font-size: 18px;height: 38px;" type="search"
                       placeholder="Search" aria-label="Search">
              </span>
  <span class="pl-1 pb-0 align-self-center">
                <ion-icon name="search-sharp"
                          style="height: 35px;font-size: 26px;--ionicon-stroke-width: 30px;color: grey ">

                </ion-icon>
              </span>
</div>

<script>
  function searchFunction() {
    var input,filter,ul,li,i,txtVal,div;
    input = document.getElementById("inputText");
    filter = input.value.toUpperCase();
    ul = document.getElementsByName("dataShow");
    li = ul.getElementsByTagName("li");
    div =
    for(i=0;i<li.length;i++){
      txtVal = li[i].textContent || [i].innerText;
      if(txtVal.toUpperCase().indexOf(filter) > -1){
        li[i].style.display = "";
      }
      else{
        li[i].style.display = "none";
      }
    }

  }
</script>
