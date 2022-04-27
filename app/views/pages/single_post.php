<?php $this->view("pages/header",$data);?>

          
          <section class="section background-white">

              
            
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-center"><?=$data['post']->title?></h4>
                <img src="<?=ROOT.$data['post']->image?>" />
                <br>
                <a href="<?=$data['url']?>"><input type="button" name = "like" class="s-12 submit-form button background-primary text-white" style="width: 150px;"  value="Like 👌 <?=$data['post']->like_count?>"></a>
                <br>
                <!-- <h3>Like Count</h3> -->
                <br>
                <?=$data['post']->description?>
            </div>  <br><br>         
          <!-- </section> 
          <section class="section background-white"> -->
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Comment</h4>
              <form name="contactForm" class="customform" method="post">
                <div class="s-12">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      <input name="email" class="required email" placeholder="Your e-mail" title="Your e-mail" type="text">
                      <p class="email-error form-error">Please enter your e-mail.</p>
                    </div>
                    <div class="s-12 m-12 l-6">
                      <input name="name" class="name" placeholder="Your name" title="Your name" type="text">
                      <p class="name-error form-error">Please enter your name.</p>
                    </div>
                  </div>
                </div>
                <div class="s-12">
                  <textarea name="message" class="required message" placeholder="Your comment" rows="3"></textarea>
                  <p class="message-error form-error">Please enter your comment.</p>
                </div>
                <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Submit Button</button></div>
              </form>
            </div>           
          </section>

<?php $this->view("pages/footer",$data);?>