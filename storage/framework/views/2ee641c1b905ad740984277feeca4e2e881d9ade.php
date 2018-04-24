<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.0/socket.io.js"></script>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2" >
                        <div id="messages" >
                            <form action="<?php echo e(route('index')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="text" name="email" value="12">
                                <button type="submit">Test</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    var socket = io.connect('http://localhost:3000');
                    socket.on('channel:message', function (data) {
                        alert(data)
                    });
                </script>