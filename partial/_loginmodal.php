<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title jmbo" id="loginModalLabel">Login to ITsolution</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/forum/partial/_loginHandler.php" method="post">
                    <div class="mb-3">
                        <label for="loginEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                      
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                    </div>
                    <button type="Submit" class="btn btn-success" value="submit" name="submit">Submit</button>
                </form>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary float-left " data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>