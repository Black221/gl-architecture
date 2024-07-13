# send request to local server
from router import routes
from utils import parse_args
from app import loop, display

if __name__ == '__main__':
    method, route, args = parse_args()
    if method == 'LOOP':
        loop()
    if method in routes and route in routes[method]:
        response = routes[method][route](*args)
        display(response)
        