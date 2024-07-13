import requests

def get_articles(format = "json"):
    url = 'http://localhost:80/api/articles?format=' + format
    response = requests.get(url)
    print(response.text)

def get_article(article_id, format = "json"):
    url = 'http://localhost:80/api/article?id=' + article_id + '&format=' + format
    response = requests.get(url)
    print(response.text)

def post_article(title, content, category, token = ""):
    url = 'http://localhost:80/api/article?token=' + str(token)
    title = title.replace('+', ' ')
    content = content.replace('+', ' ') 
    data = {'title': str(title), 'content': str(content), 'category': category}
    response = requests.post(url, data = data)
    print(response.text)

def put_article(article_id, title, content, category, token = ""):
    url = 'http://localhost:80/api/article?id=' + article_id + '&token=' + str(token)
    data = {'title': str(title), 'content': str(content), 'category': category}
    response = requests.put(url, data = data)
    print(response.text)

def delete_article(article_id, token = ""):
    url = 'http://localhost:80/api/article?id=' + article_id + '&token=' + str(token)
    response = requests.delete(url)
    print(response.text)
