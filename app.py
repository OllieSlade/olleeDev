import flask

app = flask.Flask(__name__, static_folder='static', template_folder="templates")
# from FrontendMentor.fm_flask import page as fm_page
# app.register_blueprint(fm_page, subdomain="frontendmentor")

app.config["SERVER_NAME"] = "ollee.dev"
app.config["PREFERRED_URL_SCHEME"] = "https"

@app.route("/")
@app.route("/home")
def home():
    return flask.render_template("index.html")

if __name__ == "__main__":
    website_url = "localhost:5000"
    app.config["SERVER_NAME"] = website_url
    app.run(debug=True, use_reloader=False)
