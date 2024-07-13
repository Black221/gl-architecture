import logging
from zeep import Client, Settings
from zeep.transports import Transport
from requests import Session

# Configure le logging pour afficher les requêtes SOAP
logging.basicConfig(level=logging.INFO)
logging.getLogger('zeep.transport').setLevel(logging.DEBUG)


uri = 'http://localhost:80/soap?wsdl'

# Création du client SOAP avec des paramètres de session
session = Session()
transport = Transport(session=session)
settings = Settings(strict=False)

client = Client(wsdl=uri, transport=transport, settings=settings)


def authenticate(username, password):
    data = {'username': username, 'password': password}
    return (client.service.authenticate(**data))

def create_user(username, password, token= ""):
    data = {'username': username, 'password': password, 'token': token}
    return (client.service.createUser(**data))


def get_users(token=""):
    data = {'token': token}
    return (client.service.getAllUsers(**data))

def get_user(user_id, token=""):
    data = {'id': user_id, 'token': token}
    return (client.service.getUser(**data))

def update_user(user_id, username, password, role, token=""):
    data = {'id': user_id, 'username': username, 'password': password, 'role': role, 'token': token}
    return (client.service.updateUser(**data))

def delete_user(user_id, token=""):
    data = {'id': user_id, 'token': token}
    return (client.service.deleteUser(**data))

def generate_token(id, token):
    data = {'id': id, 'token': token}
    return (client.service.generateToken(**data))
