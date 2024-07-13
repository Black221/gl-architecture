import sys

def help():
    print("GET welcome")
    print("Usage: python client.py [method] [command] [args]")
    print("GET aticles [json|xml]")
    print("GET article [id] [json|xml]")
    print("GET categories [json|xml]")
    print("GET category [id] [json|xml]")
    print("POST aticles [title] [content] [category_id] [token]")
    print("POST category [name] [token]")
    print("PUT article [id] [title] [content] [category_id] [token]")
    print("PUT category [id] [name] [token]")
    print("DELETE article [id] [token]")
    print("DELETE category [id] [token]")
    print("SOAP ADD user [username] [password] [role] [token]")
    print("SOAP GET users [token]")
    print("SOAP GET user [id] [token]")
    print("SOAP UPDATE user [id] [username] [password] [role] [token]")
    print("SOAP DELETE user [id] [token]")
    sys.exit(1)


def parse_args():
    if len(sys.argv) == 2 and sys.argv[1] == "GET" and sys.argv[2] == "welcome":
        return ["GET", "welcome"]
    if len(sys.argv) < 2 or sys.argv[1] == "help" or (sys.argv[1] != "GET" and sys.argv[1] != "POST" and sys.argv[1] != "PUT" and sys.argv[1] != "DELETE"):
        help()
    return sys.argv[1], sys.argv[2], sys.argv[3:]
        
