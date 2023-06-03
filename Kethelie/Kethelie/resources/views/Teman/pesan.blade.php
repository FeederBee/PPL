<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">

        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center p-3"
            style="border-top: 4px solid #ffa900;">
            <h5 class="mb-0">Chat messages</h5>
            <div class="d-flex flex-row align-items-center">
              <span class="badge bg-warning me-3">20</span>
              <i class="fas fa-minus me-3 text-muted fa-xs"></i>
              <i class="fas fa-comments me-3 text-muted fa-xs"></i>
              <i class="fas fa-times text-muted fa-xs"></i>
            </div>
          </div>
          <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">

            <div class="d-flex justify-content-between">
              <p class="small mb-1">Timona Siera</p>
              <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                alt="avatar 1" style="width: 45px; height: 100%;">
              <div>
                <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">For what reason
                  would it
                  be advisable for me to think about business content?</p>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
              <p class="small mb-1">Johny Bullock</p>
            </div>
            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
              <div>
                <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Thank you for your believe in
                  our
                  supports</p>
              </div>
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                alt="avatar 1" style="width: 45px; height: 100%;">
            </div>

            <div class="d-flex justify-content-between">
              <p class="small mb-1">Timona Siera</p>
              <p class="small mb-1 text-muted">23 Jan 5:37 pm</p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                alt="avatar 1" style="width: 45px; height: 100%;">
              <div>
                <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">Lorem ipsum dolor
                  sit amet
                  consectetur adipisicing elit similique quae consequatur</p>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <p class="small mb-1 text-muted">23 Jan 6:10 pm</p>
              <p class="small mb-1">Johny Bullock</p>
            </div>
            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
              <div>
                <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Dolorum quasi voluptates quas
                  amet in
                  repellendus perspiciatis fugiat</p>
              </div>
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                alt="avatar 1" style="width: 45px; height: 100%;">
            </div>

          </div>
          <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            <div class="input-group mb-0">
              <input type="text" class="form-control" placeholder="Type message"
                aria-label="Recipient's username" aria-describedby="button-addon2" />
              <button class="btn btn-warning" type="button" id="button-addon2" style="padding-top: .55rem;">
                Button
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>