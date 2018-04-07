<div class="row">
  <img class="center-block divider" src="{{asset('/img/divider.png')}}">
  <h1>Contacts</h1>
  <form class="form-horizontal">
    <div class="row">
      <h2 class="medium">Contact details:</h2>
      <div class="border-wrapper">
        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21761.72154634957!2d28.81870312124758!3d47.016380858779804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd8e8b74ac8c3ef7b!2z0JzQvtC70LTQsNCy0YHQutC40Lkg0JPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3Ri9C5INCj0L3QuNCy0LXRgNGB0LjRgtC10YI!5e0!3m2!1sru!2s!4v1523096638285" width="500" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-1 yellow-text small" for="address">Address:</label>
        <div class="col-sm-10">
          <p class="form-control-static small">Baker Street</p>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-1 yellow-text small" for="telephone">Telephone:</label>
        <div class="col-sm-10">
          <p class="form-control-static small">+373 123 456 78</p>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-1 yellow-text small" for="email">Email:</label>
        <div class="col-sm-10">
          <p class="form-control-static small">baker@pizza.com</p>
        </div>
      </div>
    </div>
    <div class="row">
      <h2 class="medium">Contact form:</h2>
      <div class="form-group col-sm-2 col-md-3">
        <label for="name" class="small">Your name:</label>
        <input type="text" class="form-control input-lg" id="name">
      </div>
      <div class="form-group col-sm-2 col-md-3 email">
        <label for="email" class="small">Email:</label>
        <input type="text" class="form-control input-lg" id="email">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-2 col-md-3">
        <label class="small" for="message">Message:</label>
        <textarea class="form-control input-lg" id="message"></textarea>
      </div>
    </div>
    <div class="row">
      <button type="submit" class="btn btn-default">submit</button>
    </div>
  </form>
</div>