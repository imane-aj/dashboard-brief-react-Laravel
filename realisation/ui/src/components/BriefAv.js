import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class BriefAv extends Component {
    constructor(props){
        super(props)
    }
  render() {
    return (
        <div className='briefAv mt-2'>
        <h4>Brief Avancement</h4>
            <div className='row'>
                {this.props.data.map(item=>(
                    <><div className='col-md-3'>{item?.brief_aff[0].Nom_du_brief}: </div> 
                    <div className='col-md-9'><ProgressBar now={item?.brief_av} label={`${item?.brief_av}%`}/></div>
                    </>
                ))}
            </div>
        </div>
    )
  }
}

export default BriefAv