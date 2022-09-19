   <tr id="<?php echo $user["id"] ?>">

        <a id="btn-edit" class="p-2 btn-primary text-justify rounded btn-edit"><i class="fa-solid fa-pen-to-square"
                  onclick="handlerEdit(event, <?php echo $user['id'] ?>)"></i></a>

        <a id="btn-delete" class="p-2 btn-danger text-justify rounded"
             onclick="handlerDelete(<?php echo $user['id'] ?>)"><i class=" fa-solid fa-eraser"></i></a>
        <!-- Begin modal edit user -->

        <div class="modal_edit">
             <div class="edit">
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                       <h1 class="h3 mb-0">Edit Users</h1>
                  </div>

                  <div class="row text-black">
                       <!-- Pending Requests Card Example -->
                       <div class="col-12 mb-4">
                            <form id="edit-form">
                                 <div class="form-row">
                                      <div class="form-group col-md-6">
                                           <label for="inputName">Name</label>
                                           <input type="text" class="form-control" id="inputName"
                                                placeholder="Full Name" required />
                                      </div>
                                      <div class="form-group col-md-6">
                                           <label for="inputEmail">Email</label>
                                           <input required type="email" class="form-control" id="inputEmail"
                                                placeholder="Email" />
                                      </div>
                                 </div>
                                 <div class="form-row">
                                      <div class="form-group col-md-6">
                                           <label for="inputPhone">Phone number</label>
                                           <input required type="phone" class="form-control" id="inputPhone"
                                                placeholder="Phone Number" />
                                      </div>

                                 </div>
                                 <div class="form-group">
                                      <label for="inputAddress">Address</label>
                                      <input required type="text" class="form-control" id="inputAddress"
                                           placeholder="1234 Main St" />
                                 </div>
                                 <button type="submit" class="btn btn-primary">Edit</button>
                                 <input type="hidden" id="hidden_id">
                            </form>
                       </div>
                  </div>
             </div>
        </div>
        <!-- end modal edit user -->

        <script>
        $(".modal_edit").click(function(event) {
             event.stopPropagation();
             $(".modal_edit").hide();
        })
        $(".edit").click(function(event) {
             event.stopPropagation();
        })

        function handlerEdit(e, id) {
             const userEl = document.getElementById(id);
             const nameUser = userEl.querySelector("#name").innerText;
             const emailUSer = userEl.querySelector("#email").innerText;
             const phoneUser = userEl.querySelector("#phone").innerText;
             const addressUser = userEl.querySelector("#address").innerText;

             $("#inputName").val(nameUser);
             $("#inputPhone").val(phoneUser);
             $("#inputEmail").val(emailUSer);
             $("#inputAddress").val(addressUser);
             $("#hidden_user_id").val(id);
             $(".modal_edit_user").show();
        }

        function handlerDelete(id) {
             $.ajax({
                  type: "POST",
                  url: "./deleteUser.php",
                  data: {
                       idUser: id
                  },
                  success: function() {
                       location.reload();
                  }
             })
        }
        $("#edit-form").submit(function(event) {
             event.preventDefault();
             $.ajax({
                  type: "POST",
                  url: "./editUser.php",
                  data: {
                       id: $("#hidden_user_id").val(),
                       name: $("#inputName").val(),
                       email: $("#inputEmail").val(),
                       phone: $("#inputPhone").val(),
                       address: $("#inputAddress").val(),
                  },
                  success: function() {
                       location.reload();
                  }
             })
        })
        </script>