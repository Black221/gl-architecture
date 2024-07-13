import requests


def get_categories(format = "json"):
    url = 'http://localhost:80/api/categories?format=' + format
    response = requests.get(url)
    return (response.text)

def get_category(category_id, format = "json"):
    url = 'http://localhost:80/api/category?id=' + category_id + '&format=' + format
    response = requests.get(url)
    return (response.text)

def post_category(label, token = ""):
    url = 'http://localhost:80/api/category?token=' + str(token)
    data = {'label': str(label)}
    response = requests.post(url, data = data)
    return (response.text)

def put_category(category_id, label, token):
    url = 'http://localhost:80/api/category?id=' + category_id + '&token=' + str(token)
    data = {'label': label}
    response = requests.put(url, data = data)
    return (response.text)

def delete_category(category_id, token = ""):
    url = 'http://localhost:80/api/category?id=' + category_id + '&token=' + str(token)
    response = requests.delete(url)
    return (response.text)