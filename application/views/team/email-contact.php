<form action="<?php echo base_url()?>index.php/en/sending_mail" method="post" id="commentform">    
                                <label for="author">
                                    Name:  *					</label>
                                <input type="text" name="author" id="author" value="" size="22" tabindex="1" class="nameInput">
                                
                                <label for="email">
                                    Email:  *					</label>
                                <input type="text" name="email" id="email" value="" size="22" tabindex="2" class="emailInput">  
                                
                                <label for="url">
                                    Website: 					</label>
                                <input type="text" name="url" id="url" value="" size="22" tabindex="3" class="webInput">
                                
                                <label for="comment">
                                    Your Question: 					</label>
                                <textarea name="comment" id="comment" tabindex="4" class="messageInput"></textarea>
                                <br>
                                <input name="submit" type="submit" id="submit" tabindex="5" value="Add Comment">
                            </form>