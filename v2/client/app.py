from router import routes
from utils import display, userForm, articleForm, categoryForm
import json



def menu(role):
    if role == "admin":
        print("Allowed access:")
        print("1- create user")
        print("2- modify user")
        print("3- delete user")
        print("4- user list")
        print("5- user detail")
        print("6- generate token")
    else :
        print("Allowed access:")
        print("1- article list")
        print("2- article detail")
        print("3- category list")
        print("4- category detail")
        print("5- create article")
        print("6- modify article")
        print("7- delete article")
        print("8- create category")
        print("9- modify category")
        print("10- delete category")
       
    return input("Select an option: ")

def loop():
    while True:
        login = input('Enter your username: ')
        password = input('Enter your password: ')
        res = json.loads(routes["POST"]["authenticate"](login, password))
        if 'username' in res:
            print("Welcome " + res['username'])
            user = res
            choice = menu(user["role"])
        else:
            print("Invalid username or password")
            print("Allawed access:")
            print("1- article list")
            print("2- article detail")
            print("3- category list")
            print("4- category detail")
            choice = input("Select an option: ")
            user= {"role": "guest"}
        
        reponse = send_request(choice, user)
        display(reponse)


def send_request(choice, user):
    if user["role"] == "admin":
        if choice == "1":
            username, password, role = userForm()
            return routes["POST"]["user"](username, password, user["token"])
        if choice == "2":
            id = input("Enter the id: ")
            username, password, role = userForm()
            return routes["PUT"]["user"](id, username, password, role, user["token"])
        if choice == "3":
            id = input("Enter the id: ")
            return routes["DELETE"]["user"](id, user["token"])
        if choice == "4":
            return routes["GET"]["users"](user["token"])
        if choice == "5":
            id = input("Enter the id: ")
            return routes["GET"]["user"](id, user["token"])
        if choice == "6":
            id = input("Enter the id: ")
            return routes["POST"]["token"](id, user["token"])

    else:
        if user["role"] == "guest" or choice <= "4":
            if choice == "1":
                return routes["GET"]["articles"]()
            if choice == "2":
                id = input("Enter the id: ")
                return routes["GET"]["article"](id)
            if choice == "3":
                return routes["GET"]["categories"]()
            if choice == "4":
                id = input("Enter the id: ")
                return routes["GET"]["category"](id)
            if choice > "4":
                print("Access denied")
        else:
            if choice == "5":
                title, content, category = articleForm()
                return routes["POST"]["article"](title, content, category, user["token"])
            if choice == "6":
                id = input("Enter the id: ")
                title, content, category = articleForm()
                return routes["PUT"]["article"](id, title, content, category, user["token"])
            if choice == "7":
                id = input("Enter the id: ")
                return routes["DELETE"]["article"](id, user["token"])
            if choice == "8":
                name = categoryForm()
                return routes["POST"]["category"](name, user["token"])
            if choice == "9":
                id = input("Enter the id: ")
                name = categoryForm()
                return routes["PUT"]["category"](id, name, user["token"])
            if choice == "10":
                id = input("Enter the id: ")
                return routes["DELETE"]["category"](id, user["token"])
    return "Invalid choice"
            