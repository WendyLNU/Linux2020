package atm;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Scanner;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;

public class ATMMainFrame extends JFrame {

	private Account account;
	private Bank bank;
	
	private JButton jbDeposit,jbWithdraw,jbCancel,jbQuery,jbTransfer;
	private JLabel jblMsg,jblName;
	private JPanel jp1,jp2,jp3,jp4;
	/**
	 * @param args
	 */
	public ATMMainFrame(final Bank bank,Account tmpA){
		this.account=tmpA;
		this.bank=bank;
		jbQuery=new JButton("查询");
		jbDeposit=new JButton("存款");
		jbWithdraw=new JButton("取款");
		jbTransfer=new JButton("转账");
		jbCancel=new JButton("退卡");	
		jblName=new JLabel("账户姓名: "+account.getName());
		jblMsg=new JLabel();
		jp1=new JPanel();
		jp2=new JPanel();
		jp3=new JPanel();
		jp4=new JPanel();
		
		jp1.add(jbQuery);
		jp1.add(jbDeposit);
		jp2.add(jbWithdraw);
		jp2.add(jbTransfer);
		jp3.add(jbCancel);
		jp4.add(jblName);
		jp4.add(jblMsg);
		//将每行逐行添加到frame中
		this.add(jp1);
		this.add(jp2);
		this.add(jp3);
		this.add(jp4);
		this.setLayout(new GridLayout(4, 1));
		Dimension d=Toolkit.getDefaultToolkit().getScreenSize();
		this.setTitle("操作界面");
		this.setBounds((d.width-300)/2, (d.height-200)/2, 300, 200);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//设置关闭窗口时JVM同时推出
		//this.pack();//调整窗口至能容纳组件的最小尺寸
		this.setVisible(true);//设置窗口可见
		this.setResizable(false);
		
		//使用匿名内部类给查询按钮注册监听器
		jbQuery.addActionListener(
			new ActionListener() {	
				public void actionPerformed(ActionEvent e) {
					JOptionPane.showMessageDialog(null, "您账户的当前余额为:"+account.getBalance(),
							"信息提示",JOptionPane.INFORMATION_MESSAGE);
				}
			}
		);
		//给存款按钮注册监听器
		jbDeposit.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					String  s= JOptionPane.showInputDialog("请输入存款金额:");
					double money=Double.parseDouble((s.equals("")?"0":s));
					bank.deposit(account, money);
					JOptionPane.showMessageDialog(null, "存款成功！！！","信息提示",
				              JOptionPane.INFORMATION_MESSAGE);
					jblName=new JLabel("账户姓名: "+account.getName());
					jblMsg.setText("余额: "+account.getBalance());
				}
			}
					
		);
		//给取款按钮注册监听器
		jbWithdraw.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					String  s= JOptionPane.showInputDialog("请输入取款金额:");
					double money=Double.parseDouble((s.equals("")?"0":s));
					bank.withdraw(account, money);
					jblName=new JLabel("账户姓名: "+account.getName());
					jblMsg.setText("余额: "+account.getBalance());
				}
			}
				
		);
		//给转账按钮注册监听器
		jbTransfer.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					String sId = JOptionPane.showInputDialog("请输入要转账的卡号:");
					long id2 = Long.parseLong(sId);
					Account account2 = bank.verifyAccount(id2);
					if(account2 != null)
					{
						String sNum = JOptionPane.showInputDialog("请输入您要转入账户的金额:");
						double money=Double.parseDouble((sNum.equals("")?"0":sNum));
						if(money <= account.balance)
						{
							bank.transferAccount(account, account2, money);
							JOptionPane.showMessageDialog(null, "转账成功！！！","信息提示",
						              JOptionPane.INFORMATION_MESSAGE);
						}
						else
						{
							JOptionPane.showMessageDialog(null, "抱歉，您账户没有足够的金额！请查看后重新选择输入！",
									"信息提示",JOptionPane.ERROR_MESSAGE);
						}
					}
					else
					{
						JOptionPane.showMessageDialog(null, "抱歉，没有找到您要转入的账户信息！请核对后重新选择输入！","信息提示",
					              JOptionPane.ERROR_MESSAGE);
					}
					jblName=new JLabel("账户姓名: "+account.getName());
					jblMsg.setText("余额: "+account.getBalance());
				}
			}	
		);
		//给退卡按钮注册监听器
		jbCancel.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					bank.saveAccountDate();
					dispose();//关闭窗口
				}
			}	
		);
		
	}
	

}

