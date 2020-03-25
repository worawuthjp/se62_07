<?php ?>
<div class="input-group input-group-sm ">
              <span class="pl-0 pr-0 pb-0 col-3">
                <input class="form-control form-control-navbar" id="inputText" onkeyup="searchFunction()"
                       style="font-size: 18px;height: 38px;" type="search"
                       placeholder="Search" aria-label="Search">
              </span>
  <span class="pl-1 pb-0 align-self-center">
                <ion-icon name="search-outline"
                          style="height: 35px;font-size: 26px;--ionicon-stroke-width: 30px;">

                </ion-icon>
              </span>
</div>

<script>
  function searchFunction() {
    var input,filter,ul,li,a,i,txtVal;
    input = document.getElementById("inputText");
    filter = input.value.toUpperCase();
    ul = document.getElementById("dataShow")

  }
</script>
