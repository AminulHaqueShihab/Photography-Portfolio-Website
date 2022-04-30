<?php $this->view("pages/header",$data);?>

      <!-- MAIN -->
      <main role="main">
        <!-- Content -->
        <article>
          <header class="section background-white">
          <?php if(is_array($data['user'])): ?>
            <div>
              <div>
                <img class="logo-before" src="<?=ASSETS?>minima/img/profile.png" alt="">
              </div>
              <div class="line text-left">        
                <h2 class="text-size-30 margin-bottom-20 text-dark text-left"><?=$data['user'][0]->name?></h2>
                <h3 class="text-size-20 margin-bottom-10 text-dark text-left"><?=$data['user'][0]->occupation?>,</h3>
                <h3 class="text-size-20 margin-bottom-10 text-dark text-left"><?=$data['user'][0]->institution?></h3>
                <h3 class="text-size-20 margin-bottom-10 text-dark text-left"><?=$data['user'][0]->city?>, <?=$data['user'][0]->country?>.</h3>              
              </div>
            </div>
          <?php endif; ?>  
          </header>

          <?php if(is_array($data['posts'])): ?>
          
          <?php foreach($data['posts'] as $row): ?>

            <div class="background-white full-width"> 
              <div class="s-12 m-6 l-five">
                <a class="image-with-hover-overlay image-hover-zoom" href="<?=ROOT.'single_post/' .$row->url_address; ?>/" title="Portfolio Image">
                  <div class="image-hover-overlay background-primary"> 
                    <div class="image-hover-overlay-content text-center padding-2x">
                      <h3 class="text-white text-size-20 margin-bottom-10"><?=$row->title?></h3>
                      <p class="text-white text-size-14 margin-bottom-20"><?=$row->description?></p>  
                    </div> 
                  </div> 
                  <img class="full-img" src="<?=ROOT. $row->image?>" alt=""/>
                </a>	
              </div>

          <?php endforeach; ?>
          <?php endif; ?>

          </div>  
        </article>
        <br>
        <section>
          <a href="<?=$data['prev_page']?>"><input type="button" class="s-12 submit-form button background-primary text-white" style="width: 200px;"  value="Prev"></a>
          <a href="<?=$data['next_page']?>"><input type="button" class="s-12 submit-form button background-primary text-white" style="width: 200px; float: right;"  value="Next"></a>
        </section>
      </main>
      
    <?php $this->view("pages/footer",$data);?>