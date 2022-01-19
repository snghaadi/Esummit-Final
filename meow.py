import os

with open('sample.html','a+') as f: 
    for i in os.listdir('assets/collab'):
        app = f'''
        <div class="col-lg-2 col-md-6 col-sm-6 col-12 wow zoomIn" data-wow-delay=".2s">
                    <div class="single-brand">
                        <img src="assets/collab/{i}" alt="">
                    </div>
                </div>\n
                '''
        f.write(app)
