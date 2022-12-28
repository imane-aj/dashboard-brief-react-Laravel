import React, { Component } from "react";
import axios from "axios";
import StudentAv from "./StudentAv";

export default class Header extends Component {
  constructor(props) {
    super(props);
    this.state = {
      years: [],
      goups: [],
      selectedGroupt: "",
      students: [],
      studentCount: "",
      briefs : [],
      preparation_briefs : [],
      briefsAffNames: [],
      selected_students : []
    };
  }

  changeData = (e) => {
    let selected_group = {};
    let student_Count = {};
    let groups = this.state.groups;
    let students = this.state.students;
    let briefs = this.state.briefs;
    let preparation_briefs = this.state.preparation_briefs
    let year_id = e.target.value;
    for (var i in groups) {
      let group = groups[i];
      if (year_id == group.formation_id) {
        selected_group = groups[i];
        this.setState({
          selectedGroupt: selected_group,
        });
      }
    }
    
    let arr = [];
    let studentsId=[];
    let briefsAff = []
    let briefsAffName = []
    let selected_student = []
    for (var i in students) {
      let student = students[i];
      if (selected_group.id == student.group_id) {
        arr.push(student_Count);
        studentsId = students[i]
        selected_student.push(studentsId)
        for(var i in briefs){
            let brief = briefs[i]
            if(studentsId.id == brief.student_id){
                briefsAff = briefs[i]
                for(i in preparation_briefs){
                    let preparation_brief = preparation_briefs[i]
                    if(briefsAff.preparation_brief_id == preparation_brief.id){
                        briefsAffName.push(preparation_briefs[i])
                    }
                }
            }
        }
      }
    }
    this.setState({
      studentCount: arr.length,
      briefsAffNames : briefsAffName,
      selected_students : selected_student
    });
    
  };


  getData = () => {
    axios.get("http://localhost:8000/api/group").then((res) => {
      this.setState({
        years: res.data.years,
        groups: res.data.groups,
        students: res.data.students,
        briefs : res.data.briefs,
        preparation_briefs : res.data.preparation_briefs
      });
    });
  };

  componentDidMount() {
    this.getData();
  }
  render() {
    return (
      <div>
        <div className="row">
          <div className="col-md-8">
            <h1>tableau de borde d'état d'avancement</h1>
          </div>
          <div className="col-md-4 selectY">
            <select onChange={this.changeData} placeholder="année" id="input">
              <option>Année</option>
              {this.state.years.map((item) => (
                <option value={item.id}>{item.formation_year}</option>
              ))}
            </select>
          </div>

          <div className="row info">
            <div className="col-md-4">
              <img src="" alt="logo"></img>
              <span>{this.state.selectedGroupt.name}</span>
            </div>
            <div className="col-md-4 info">
              <p>{this.state.studentCount} apprenants</p>
            </div>
            <div className="col-md-4"></div>
          </div>
        </div>

        <div className="row etatAv">
            <div className="col-md-6"></div>
            <div className="col-md-6 etatAvSt">
                <StudentAv data={this.state.briefsAffNames} selected_students={this.state.selected_students}/>
            </div>
        </div>
      </div>
    );
  }
}
