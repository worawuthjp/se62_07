<div class="modal fade" id="cartModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-olive">
        <h4 class="modal-title align-self-center" style="height: 30px">
          <ion-icon name="cart-outline" class="align-self-center mt-2"
                    style="font-size: 26px;--ionicon-stroke-width: 50px;">
          </ion-icon>
          Cart
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body overflow-auto" style="height: 500px">

        <?php include "../borrow/view/cartBox.php"; ?>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn bg-olive btn-outline">ยืนยันคำขอทั้งหมด</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="borrowModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-olive">
        <h5 class="modal-title row">
          <ion-icon name="create-outline"
                    style="font-size: 30px;--ionicon-stroke-width: 50px;">
          </ion-icon>
          ส่งคำขอยืมอุปกรณ์
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="get" action="../borrow/borrow.php"> <!--../controller/queryonBorrow.php-->
        <div class="modal-body overflow-auto" style="height: 500px">

          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>อาจารย์ผู้รับผิดชอบ :</span>
            </div>
            <div class="col-xl-8 col-12">
              <select type="text" class="form-control" id="teacherSelect" name="teacherSelect" value=""
                      placeholder="รายชื่ออาจารย์" maxlength="100">
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>กำหนดวันคืนอุปกรณ์ :</span>
            </div>
            <div class="col-xl-8 col-12">
              <div class="input-group">
                <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                </div>
                <input type="text" class="form-control float-right" id="reservation" name="dateSelect">
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span>เหตุผลการยืม :</span>
            </div>
            <div class="col-xl-8 col-12">
              <textarea maxlength="250" class="form-control" placeholder="เหตุผล" name="reason" rows="4"></textarea>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-xl-3 col-12 text-right">
              <span><strong>รายการอุปกรณ์ :</strong></span>
            </div>
            <div class="col-xl-2 col-4">
              <input type="number" maxlength="5" class="form-control" value="1" name="num_borrow" rows="4">
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" name="btnClose" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="btnSend" class="btn bg-olive btn-outline">ยืนยันคำขอทั้งหมด</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
