from zeep import Client

def create_user(username, password, role, token= ""):
    client = Client('http://localhost/saop?wsdl')
    data = {'username': username, 'password': password, 'role': role, 'token': token}
    return client.service.createUser(data)


def get_users(token=""):
    client = Client('http://localhost/saop')
    data = {'token': token}
    return client.service.getAllUsers(data)

def get_user(user_id, token=""):
    client = Client('http://localhost/saop')
    data = {'id': user_id, 'token': token}
    return client.service.getUser(data)

def update_user(user_id, username, password, role, token=""):
    client = Client('http://localhost/saop')
    data = {'id': user_id, 'username': username, 'password': password, 'role': role, 'token': token}
    return client.service.updateUser(data)

def delete_user(user_id, token=""):
    client = Client('http://localhost/saop')
    data = {'id': user_id, 'token': token}
    return client.service.deleteUser(data)