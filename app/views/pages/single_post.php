<?php $this->view("pages/header",$data);?>

          
          <section class="section background-white">

              
            
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-center"><?=$data['post']->title?></h4>
                <img src="<?=ROOT.$data['post']->image?>" />
                <?php if(is_array($data['user'])): ?>
                  <p>by <?=$data['user'][0]->name?></p>
                <?php endif;?>
                <br>
                <a href="<?=$data['url']?>"><input type="button" name = "view" class="s-12 submit-form button background-blue text-white" style="width: 150px;"  value="Views 👁 <?=$data['post']->view_count?>"></a>
                <br>
                <br>
                <?=$data['post']->description?>
            </div>  <br><br>         
          <!-- </section> 
          <section class="section background-white"> -->\
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-left">Comments</h4>
              <?php if(is_array($data['comments'])): ?>
              <?php foreach($data['comments'] as $comment):?>
                <div class="text-size-20 margin-bottom-20 text-dark text-left">
                  <p class="text-black text-size-10 margin-bottom-10"><img src="<?=ASSETS?>minima/img/profile50x30.png" alt="Profile_img"><?=$comment->comment_auth?><br><?=$comment->comment_date?></p>
                  <p class="text-black text-size-20 margin-bottom-20"><?=$comment->comment_text?></p>
                  <hr class="solid" style="border-top: 2px solid #bbb">  
                </div> 
                
              <?php endforeach;?>
              <?php endif;?>
            </div>
            
            <div class="s-12 m-12 l-4 center">
              <h4 class="text-size-20 margin-bottom-20 text-dark text-center">Leave Your Comment</h4>
              <form name="contactForm" class="customform" method="post">
                <div class="s-12">
                  <div class="margin">
                    <!-- <div class="s-12 m-12 l-6">
                      <input name="email" class="required email" placeholder="Your e-mail" title="Your e-mail" type="text">
                      <p class="email-error form-error">Please enter your e-mail.</p>
                    </div> -->
                    <div class="s-12">
                      <input name="name" class="name" placeholder="Your name" title="Your name" type="text">
                      <p class="name-error form-error">Please enter your name.</p>
                    </div>
                  </div>
                </div>
                <div class="s-12">
                  <textarea name="comment" class="required message" placeholder="Your comment" rows="3"></textarea>
                  <p class="message-error form-error">Please enter your comment.</p>
                </div>
                <div class="s-12"><button class="s-12 submit-form button background-primary text-white" type="submit">Submit</button></div>
              </form>
            </div>           
          </section>

<?php $this->view("pages/footer",$data);?>