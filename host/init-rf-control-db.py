import sqlite3

con = sqlite3.connect('data/rf.db')
cur = con.cursor()

for g_i in range(32):
    g_query = "INSERT INTO groups VALUES("+str(g_i)+", '"+str(g_i)+"')"
    cur.execute(g_query)
    for s_i in range(5):
        query = "INSERT INTO sockets VALUES("+str(((g_i*5)+s_i))+", '"+str(chr(65+s_i))+"', '"+str(chr(65+s_i))+"', "+str(g_i)+")"

        cur.execute(query)

con.commit()
