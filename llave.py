import sys
from Crypto.PublicKey import RSA
key = RSA.generate(2048)
secret_code=str(sys.argv)
private_key = key.export_key(passphrase=secret_code)
file_out = open("private", "wb")
file_out.write(private_key)
file_out.close()
secret_code = "Unguessable"
public_key = key.publickey().export_key()
file_out = open("public.pub", "wb")
file_out.write(public_key)
file_out.close()