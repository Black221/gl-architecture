# send request to local server
from router import routes
from utils import parse_args



if __name__ == '__main__':
    method, route, args = parse_args()
    routes[method][route](*args)
        