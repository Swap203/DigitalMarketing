
CREATE DATABASE digitalImage;

CREATE TABLE status (
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    slug varchar(255) NOT NULL,    
    PRIMARY KEY (ID)
);


CREATE TABLE role (
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(20) NOT NULL, 
    statusId int,  
    PRIMARY KEY (ID),
    FOREIGN KEY (statusId) REFERENCES status(ID)    
);

CREATE TABLE user(
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL, 
    email varchar(200) NOT NULL, 
    mobile varchar(200) NOT NULL, 
    password varchar(200) NOT NULL, 
    statusId int,
    roleId int,
    PRIMARY KEY (ID),
    FOREIGN KEY (statusId) REFERENCES status(ID),
    FOREIGN KEY (roleId) REFERENCES role(ID)
);

CREATE TABLE user_role(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    roleId int,
    FOREIGN KEY (roleId) REFERENCES role(ID),
    userId int,
    FOREIGN KEY (userId) REFERENCES user(ID)
);

CREATE TABLE branch(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    address varchar(4000) NOT NULL, 
    telphone varchar(200) NOT NULL, 
    website varchar(200) NOT NULL,
    banchCode varchar(200) NOT NULL,
    userId int,
    FOREIGN KEY (userId) REFERENCES user(ID)
);

CREATE TABLE user_branch(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    branchId int,
    FOREIGN KEY (branchId) REFERENCES user(ID),
    userId int,
    FOREIGN KEY (userId) REFERENCES user(ID),
    salary varchar(20) NOT NULL
);
ALTER TABLE user_branch AUTO_INCREMENT = 0110;

CREATE TABLE bussiness_partner(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    name varchar(200) NOT NULL,
    email varchar(400) NOT NULL,
    mobile varchar(20) NOT NULL,
    address varchar(45000) NOT NULL,
    country varchar(200) NOT NULL,
    city_town varchar(200) NOT NULL,
    brand varchar(500) NOT NULL,
    company varchar(2000) NOT NULL,
    comment text(65000) NOT NULL,
    created_at datetime,
    updated_at datetime
);



CREATE TABLE course_type(
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL, 
    statusId int,
    PRIMARY KEY (ID),
    FOREIGN KEY (statusId) REFERENCES status(ID)
);

CREATE TABLE course(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    name varchar(100) NOT NULL, 
    statusId int,   
    FOREIGN KEY (statusId) REFERENCES status(ID),
    courseTypeId int,   
    FOREIGN KEY (courseTypeId) REFERENCES course_type(ID),
    image varchar(100) NOT NULL, 
    classLength varchar(20) NOT NULL, 
    duration varchar(20) NOT NULL, 
    registrationFee varchar(20) NOT NULL, 
    tutionFee varchar(200) NOT NULL, 
    careerOption text(25000) NOT NULL, 
    courseContent text(25000) NOT NULL, 
    description text(25000) NOT NULL
);

CREATE TABLE branch_course(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    courseId int,
    FOREIGN KEY (courseId) REFERENCES course(ID),
    branchId int,
    FOREIGN KEY (branchId) REFERENCES branch(ID)
);



CREATE TABLE video_type(
    ID int NOT NULL AUTO_INCREMENT,
     PRIMARY KEY (ID),
    name varchar(100) NOT NULL
);


CREATE TABLE course_video(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    statusId int,   
    FOREIGN KEY (statusId) REFERENCES status(ID),
    courseId int,   
    FOREIGN KEY (courseId) REFERENCES course(ID),
    videoTypeId int,   
    FOREIGN KEY (videoTypeId) REFERENCES video_type(ID),
    featured varchar(10) NOT NULL,
    video_url varchar(400),
    video_file varchar(400)
    
);

CREATE TABLE course_material(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    courseId int,   
    FOREIGN KEY (courseId) REFERENCES course(ID),
    name varchar(400)
);


CREATE TABLE question_type(
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL, 
    statusId int,
    PRIMARY KEY (ID),
    FOREIGN KEY (statusId) REFERENCES status(ID)
);


CREATE TABLE question_paper(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    statusId int,   
    FOREIGN KEY (statusId) REFERENCES status(ID),
    courseId int,   
    FOREIGN KEY (courseId) REFERENCES course(ID),
    questionTypeId int,   
    FOREIGN KEY (questionTypeId) REFERENCES question_type(ID),
    question varchar(2000) NOT NULL,
    correct_answer varchar(2000) NOT NULL
);

CREATE TABLE question_answer(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    questionPaperId int,   
    FOREIGN KEY (questionPaperId) REFERENCES question_paper(ID),
    answer varchar(2000) NOT NULL
);


CREATE TABLE testimonial(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    name varchar(500) NOT NULL,
    image varchar(2000) NOT NULL,
    testimonial varchar(20000) NOT NULL,
    statusId int,   
    FOREIGN KEY (statusId) REFERENCES status(ID)
);


CREATE TABLE userstudent(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    name varchar(500) NOT NULL,
    emailID varchar(2000) NOT NULL,
    password varchar(2000) NOT NULL,
    address varchar(2000) NOT NULL,
    mobileNO varchar(2000) NOT NULL,
    emailVerification ENUM('1', '2') NOT NULL,
    emailVertificationCode varchar(10) NOT NULL,
    mobileVerification ENUM('1', '2') NOT NULL,
    mobileVertificationCode varchar(10) NOT NULL,
    statusId int,   
    FOREIGN KEY (statusId) REFERENCES status(ID),
    roleId int,   
    FOREIGN KEY (roleId) REFERENCES role(ID),
    created_at datetime,
    updated_at datetime
);

CREATE TABLE student_personal_details(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    studentId int,
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    dob varchar(20) NOT NULL,
    age varchar(10) NOT NULL,
    education varchar(1000),
    phoneNo varchar(20) NOT NULL
);

CREATE TABLE forgotpasswordstudent(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    hashCode varchar(500) NOT NULL,
    studentId int,   
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    created_at datetime
);

CREATE TABLE orderitem(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    courseId int,   
    FOREIGN KEY (courseId) REFERENCES course(ID),
    tutionFee varchar(20),
    registrationFee varchar(20),
    created_at datetime
);

CREATE TABLE orders(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    orderitem varchar(200), --- json order item 
    statusId int(8),
    FOREIGN KEY (statusId) REFERENCES status(ID),
    studentId int(8),
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    total varchar(20),
    grantTotal varchar(20),
    created_at datetime,
    updated_at datetime
);


CREATE TABLE expenditure(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    reason text(45000) NOT NULL,
    amount varchar(20) NOT NULL,
    attachment varchar(200),
    expenditureDate varchar(20),
    branchId int(8),
    FOREIGN KEY (branchId) REFERENCES user(ID)
);

CREATE TABLE ofline_payment_mode (
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(20) NOT NULL, 
    statusId int,  
    PRIMARY KEY (ID),
    FOREIGN KEY (statusId) REFERENCES status(ID)    
);

CREATE TABLE student_enroll(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),    
    branchId int(10),
    FOREIGN KEY (branchId) REFERENCES user(ID),
    courseId int(10),
    FOREIGN KEY (courseId) REFERENCES course(ID),
    studentId int(10),
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    courseFee varchar(20),
    registrationFee varchar(20),
    tutionFee varchar(20),
    paidAmount varchar(20),
    enroll_date varchar(20),
    emi varchar(8),
    emiAmount varchar(20),
    remainingAmount varchar(20),
    courseDuration int(10),
    courseStartDate datetime,
    formNo varchar(200),
    centerCodeNo varchar(200),
    studentCodeNo varchar(200),
    created_at datetime,
    updated_at datetime,
    deleteEntry enum('1','2') default '2',
    userentroll enum('online','offline') default 'online'
);

ALTER TABLE student_enroll AUTO_INCREMENT = 0110;

CREATE TABLE fee_transaction(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),    
    studentEnrollId int(10),
    FOREIGN KEY (studentEnrollId) REFERENCES student_enroll(ID),
    paymentmode_id int(10),
    FOREIGN KEY (paymentmode_id) REFERENCES ofline_payment_mode(ID),
    paidAmount varchar(30),
    remainingAmount varchar(30),
    chequeNo varchar(30),
    chequeDate varchar(30),
    bankName varchar(200),
    created_at datetime,
    updated_at datetime
);


CREATE TABLE fee_transaction(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID), 

);  

CREATE TABLE exam_code(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),    
    courseId int(10),
    FOREIGN KEY (courseId) REFERENCES course(ID),
    studentId int(10),
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    enrollId int(10),
    FOREIGN KEY (enrollId) REFERENCES student_enroll(ID),
    examCode varchar(30),
    useCode ENUM('1', '2') default '2',
    created_at datetime
);  

WHERE dm.dl_time BETWEEN str_to_date('2011-05-06','%Y-%m-%d') AND str_to_date('2011-05-31','%Y-%m-%d')



CREATE TABLE exam_code(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),    
    courseId int(10),
    FOREIGN KEY (courseId) REFERENCES course(ID),
    studentId int(10),
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    enrollId int(10),
    FOREIGN KEY (enrollId) REFERENCES student_enroll(ID),
    examCode varchar(30),
    useCode ENUM('1', '2') default '2',
    created_at datetime
);


CREATE TABLE exam(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID), 
    courseId int(10),
    FOREIGN KEY (courseId) REFERENCES course(ID),
    studentId int(10),
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    enrollId int(10),
    FOREIGN KEY (enrollId) REFERENCES student_enroll(ID),
    examCodeId int(10),
    FOREIGN KEY (examCodeId) REFERENCES exam_code(ID),
    exam_date datetime,
    exam_endtime datetime,
    totalMarks int(10),
    correctAnswer int(10),
    incorrectAnswer int(10),
    notVisitedAnswer int(10),
    result varchar(20)
);


CREATE TABLE exam_question_paper(

    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID), 
    examId int(10),
    FOREIGN KEY (examId) REFERENCES EXAM(ID),
    questionId int(10),
    FOREIGN KEY (questionId) REFERENCES question_paper(ID),
    answer int(10)

);


CREATE TABLE exam_result(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID), 
    examId int(10),
    FOREIGN KEY (examId) REFERENCES EXAM(ID),
    courseId int(10),
    FOREIGN KEY (courseId) REFERENCES course(ID),
    studentId int(10),
    FOREIGN KEY (studentId) REFERENCES userstudent(ID),
    enrollId int(10),
    FOREIGN KEY (enrollId) REFERENCES student_enroll(ID),
    examCodeId int(10),
    FOREIGN KEY (examCodeId) REFERENCES exam_code(ID),
    examCode varchar(20),
    notAnswer int(10),
    notVisited int(10),
    previewAnswer int(10),
    saveAnswer int(10),
    correctAnswe int(10),
    totalquestion int(10),
    exam_endDate datetime,
    created_at datetime,
    totalMarks int(10),
    obtainMarks int(10),
    result enum('fail','pass') default 'fail'

);


CREATE TABLE enquire(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID), 
    name varchar(200),
    email varchar(400),
    phone varchar(20),
    location varchar(400),
    message varchar(2000),
    enquire_date datetime
);

CREATE TABLE placement(
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID), 
    image varchar(200)
   
);