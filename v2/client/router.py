import requests
from routes.article import get_articles, get_article, post_article, put_article, delete_article
from routes.category import get_categories, get_category, post_category, put_category, delete_category
from routes.user import create_user, get_users, get_user, update_user, delete_user

base_url = 'http://localhost:80/api/'

def welcome():
    url = 'http://localhost:80/api'
    response = requests.get(url)
    print(response.text)    



routes = {
    "GET": {
        "welcome": welcome, # "GET /api/
        "articles": get_articles,
        "article": get_article,
        "categories": get_categories,
        "category": get_category,
        "users": get_users,
        "user": get_user
    },
    "POST": {
        "article": post_article,
        "category": post_category,
        "user": create_user,
    },
    "PUT": {
        "article": put_article,
        "category": put_category,
        "user": update_user,
    },
    "DELETE": {
        "article": delete_article,
        "category": delete_category,
        "user": delete_user,

    }
}