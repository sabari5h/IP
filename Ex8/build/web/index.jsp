<%-- 
    Document   : newjsp
    Created on : Mar 26, 2024, 2:03:02 PM
    Author     : Administrator
--%>

<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            Connection con=DriverManager.getConnection("jdbc:derby://localhost:1527/student");
            Statement stmt=con.createStatement();
            ResultSet rs=stmt.executeQuery("select*from students");
            %>
            <table BORDER="3">
                <tr>
                    <th>student id</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>age</th>
                    <th>department</th>
                </tr>
                <% while(rs.next()){ %>
                <tr>
                    <td><% out.print(rs.getInt(1)); %></td>
                    <td><% out.print(rs.getString(2)); %></td>
                    <td><% out.print(rs.getString(3)); %></td>
                    <td><% out.print(rs.getInt(4)); %></td>
                    <td><% out.print(rs.getString(5)); %></td>
                </tr>
                <% } %>
            </table>
            
             <p>The total number of students in the database:
                <% 
                    rs=stmt.executeQuery("select count(*) from students");
                    rs.next();
                    out.print(rs.getInt(1));
                 %>
             </p>
             <p>The average age of all students: 
                <% 
                    rs=stmt.executeQuery("select avg(age) from students");
                    rs.next();
                    out.print(rs.getInt(1));
                 %>
             </p>
             <p>The department with the highest number of students.
                <% 
                    rs=stmt.executeQuery("select count(*) from students group by department");
                    rs.next();
                    out.print(rs.getInt(1));
                 %>
             </p>
             
    </body>
</html>
