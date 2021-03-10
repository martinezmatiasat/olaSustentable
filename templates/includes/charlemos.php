<section id="charlemos" class="contact">
   <div class="container">

      <div class="section-title">
         <h2>Charlemos</h2>
      </div>

      <div class="row">

         <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="name">Nombre</label>
                     <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                     <div class="validate"></div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="name">Email</label>
                     <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                     <div class="validate"></div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="name">Asunto</label>
                  <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
               </div>
               <div class="form-group">
                  <label for="name">Mensaje</label>
                  <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                  <div class="validate"></div>
               </div>
               <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
               </div>
               <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
         </div>

      </div>

   </div>
</section>